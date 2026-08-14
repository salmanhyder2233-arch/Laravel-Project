@extends('layouts.app')

@section('content')
<section class="page-header">
    <h1>Team Dashboard</h1>
    <p>Contact submissions and role applications.</p>

    <form method="POST" action="{{ url('/admin-logout') }}">
        @csrf
        <button type="submit" class="hero-btn">Log Out</button>
    </form>
</section>

<section class="admin-section">

    <h2>Contact Submissions</h2>
    @forelse ($submissions as $submission)
        <div class="content-card admin-card">
            <div class="admin-card-header">
                <strong>{{ $submission->name }}</strong>
                <span>{{ $submission->created_at->diffForHumans() }}</span>
            </div>
            <p><strong>Email:</strong> {{ $submission->email }}</p>
            <p><strong>Subject:</strong> {{ $submission->subject }}</p>
            <p>{{ $submission->message }}</p>

            <form method="POST" action="{{ url('/admin/submission/'.$submission->id) }}" onsubmit="return confirm('Delete this submission?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </div>
    @empty
        <p style="text-align:center; color:#666;">No submissions yet.</p>
    @endforelse

    <h2 style="margin-top:50px;">Applications</h2>

    <div class="role-tabs">
        <a href="{{ url('/twc-panel-8x2') }}" class="role-tab {{ !$roleFilter ? 'active' : '' }}">All</a>
        <a href="{{ url('/twc-panel-8x2') }}?role=Role 1 Name" class="role-tab {{ $roleFilter == 'Role 1 Name' ? 'active' : '' }}">Ambassador</a>
        <a href="{{ url('/twc-panel-8x2') }}?role=Role 2 Name" class="role-tab {{ $roleFilter == 'Role 2 Name' ? 'active' : '' }}">Finance</a>
        <a href="{{ url('/twc-panel-8x2') }}?role=Role 3 Name" class="role-tab {{ $roleFilter == 'Role 3 Name' ? 'active' : '' }}">Social Media</a>
        <a href="{{ url('/twc-panel-8x2') }}?role=Role 4 Name" class="role-tab {{ $roleFilter == 'Role 4 Name' ? 'active' : '' }}">Outreach</a>
        <a href="{{ url('/twc-panel-8x2') }}?role=Volunteer" class="role-tab {{ $roleFilter == 'Volunteer' ? 'active' : '' }}">Volunteer</a>
    </div>

    @forelse ($applications as $application)
        <div class="content-card admin-card">
            <div class="admin-card-header">
                <strong>{{ $application->name }}</strong>
                <span>{{ $application->created_at->diffForHumans() }}</span>
            </div>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <p><strong>Applying for:</strong> {{ $application->role }}</p>
            <p><strong>Join Reason:</strong></p>
            <details class="text-toggle">
                <summary>{{ \Illuminate\Support\Str::limit($application->join_reason, 80) }}</summary>
                <p>{{ $application->join_reason }}</p>
            </details>

            @if ($application->message)
                <p><strong>Message:</strong></p>
                <details class="text-toggle">
                    <summary>{{ \Illuminate\Support\Str::limit($application->message, 80) }}</summary>
                    <p>{{ $application->message }}</p>
                </details>
            @endif

            <form method="POST" action="{{ url('/admin/application/'.$application->id) }}" onsubmit="return confirm('Delete this submission?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </div>
    @empty
        <p style="text-align:center; color:#666;">No applications yet.</p>
    @endforelse

</section>
@endsection
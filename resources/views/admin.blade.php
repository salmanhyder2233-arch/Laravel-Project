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
    @forelse ($applications as $application)
        <div class="content-card admin-card">
            <div class="admin-card-header">
                <strong>{{ $application->name }}</strong>
                <span>{{ $application->created_at->diffForHumans() }}</span>
            </div>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <p><strong>Applying for:</strong> {{ $application->role }}</p>
            <p><strong>Join Reason:</strong> {{ $application->join_reason }}</p>
            <p>{{ $application->message }}</p>
            <details class="text-toggle">
                <summary>{{ \Illuminate\Support\Str::limit($application->message, 80) }}</summary>
                <p>{{ $application->message }}</p>
            </details>            


            <form method="POST" action="{{ url('/admin/application/'.$application->id) }}" onsubmit="return confirm('Delete this application?');">
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
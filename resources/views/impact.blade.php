@extends('layouts.app')

@section('content')

<section class="page-header">
    <span class="sparkle sparkle-1">✦</span>
    <span class="sparkle sparkle-2">✦</span>
    <span class="sparkle sparkle-3">✦</span>

    <h1>Our Impact</h1>
    <p>
        Every act of kindness creates a ripple effect that reaches far beyond
        what we can see.
    </p>
</section>

<div class="stats-grid">

    <div class="stat-card">
        <i class="fa-solid fa-users stat-icon"></i>
        <h2>9</h2>
        <p>Volunteers</p>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-people-group stat-icon"></i>
        <h2>—</h2>
        <p>Community Projects</p>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-heart stat-icon"></i>
        <h2>—</h2>
        <p>Lives Reached</p>
    </div>

</div>

<section class="mission-cta">
    <h2>Help us grow these numbers</h2>
    <p>Every volunteer and every donation adds to the impact above.</p>
    <a href="{{ url('/get-involved') }}" class="btn-primary">Get Involved</a>
</section>

@endsection
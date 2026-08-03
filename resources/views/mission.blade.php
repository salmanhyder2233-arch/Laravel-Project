@extends('layouts.app')

@section('content')

<section class="page-header">
    <span class="sparkle sparkle-1">✦</span>
    <span class="sparkle sparkle-3">✦</span>
    <span class="sparkle sparkle-2">✦</span>    

    <h1>Our Mission</h1>
    <p>
        Our mission is to empower communities by providing support, education,
        and opportunities that create lasting positive change.
    </p>
</section>

<section class="stats-grid">

    <div class="content-card">
        <i class="fa-solid fa-book content-icon"></i>
        <h2>Education</h2>
        <p>Promoting learning opportunities that unlock potential.</p>
    </div>

    <div class="content-card">
        <i class="fa-solid fa-hands-holding-child content-icon"></i>
        <h2>Support</h2>
        <p>Assisting families and individuals through community outreach.</p>
    </div>

    <div class="content-card">
        <i class="fa-solid fa-seedling content-icon"></i>
        <h2>Sustainability</h2>
        <p>Building initiatives that continue benefiting future generations.</p>
    </div>

</section>

<section class="mission-cta">
    <h2>Want to be part of it?</h2>
    <p>Every volunteer hour and donation moves this mission forward.</p>
    <a href="{{ url('/get-involved') }}" class="btn-primary">Get Involved</a>
</section>

@endsection
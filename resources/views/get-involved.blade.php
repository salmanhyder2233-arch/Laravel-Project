@extends('layouts.app')

@section('content')

<section class="donate-hero">
    <span class="sparkle sparkle-1">✦</span>
    <span class="sparkle sparkle-3">✦</span>
    <span class="sparkle sparkle-2">✦</span>

    <h1>Get Involved</h1>
    <p>
        Together, we can create meaningful change. Whether you choose to
        volunteer, spread awareness, or donate, every contribution helps us
        make a lasting impact.
    </p>

</section>

@php
    $percent = $settings->goal_amount > 0 ? min(100, round(($settings->raised_amount / $settings->goal_amount) * 100)) : 0;
@endphp

<div class="progress-wrapper">
    <div class="progress-bar">
        <div class="progress-fill" style="width: {{ $percent }}%;"></div>
    </div>
    <p class="progress-label">
        PKR {{ number_format($settings->raised_amount) }} raised of {{ number_format($settings->goal_amount) }} goal ({{ $percent }}%)
    </p>
</div>

<div class="apply-donate-wrapper">

    <section class="donation-section">

        <div class="donation-card">

            <h2>Support Our Mission!</h2>

            <p>
                Your generosity enables us to continue supporting communities,
                funding outreach programs, and bringing hope to those who need it most.
            </p>

            <div class="payment-details">
                <p><strong>JazzCash Number</strong></p>
                <p>03154706813</p>
                <p><strong>Account Name</strong></p>
                <p>Together We Care</p>
            </div>

            <button id="copyNumber" class="donate-btn">
                Copy Number
            </button>

        </div>

    </section>

    <section class="apply-section" id="apply-section">
        <h2 style="text-align:center;">Apply to Help</h2>
        <p style="text-align:center; color:#666;">Choose a role and tell us a bit about yourself.</p>

        <form class="contact-form" method="POST" action="{{ route('apply.send') }}">
            @csrf

            <input type="text" name="name" placeholder="Your Full Name" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">

            <select name="role" required>
                <option value="" disabled selected>Which role are you applying for?</option>
                <option value="Role 1 Name">Ambassador</option>
                <option value="Volunteer">Volunteer</option>
            </select>

            <textarea name="join_reason" id="join_reason" rows="3" required maxlength="250" placeholder="Why do you want to join TWC?">{{ old('join_reason') }}</textarea>
            <p class="char-counter"><span id="join_reason_count">0</span>/250</p>

            <textarea name="message" id="message" rows="5" maxlength="500" placeholder="Anything you'd like us to know? (optional)">{{ old('message') }}</textarea>
            <p class="char-counter"><span id="message_count">0</span>/500</p>

            <button type="submit" class="btn-primary">Submit Application</button>
        </form>

        @if (session('success'))
            <p style="color: green; text-align:center; margin-top: 15px;">{{ session('success') }}</p>
        @endif
    </section>

</div>

<script>
const copyBtn = document.getElementById("copyNumber");

copyBtn.addEventListener("click", () => {

    navigator.clipboard.writeText("03154706813");

    copyBtn.textContent = "Copied!";

    setTimeout(() => {
        copyBtn.textContent = "Copy Number";
    },2000);

});
</script>

@endsection
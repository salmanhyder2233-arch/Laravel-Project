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

<div class="apply-donate-wrapper">

    <section class="donation-section">

        <div class="donation-card">

            <h2>Support Our Mission!</h2>

            <p>
                Your generosity enables us to continue supporting communities,
                funding outreach programs, and bringing hope to those who need it most.
            </p>

            <div class="qr-box">
                <img src="{{ asset('images/qr-placeholder.jpeg') }}" alt="Scan to donate">
            </div>

            <div class="payment-details">
                <p><strong>EasyPaisa Number</strong></p>
                <p>03154706813</p>
                <p><strong>Account Name</strong></p>
                <p>Together We Care</p>
            </div>

            <button id="copyNumber" class="donate-btn">
                Copy Number
            </button>

        </div>

    </section>

    <section class="apply-section">
        <h2 style="text-align:center;">Apply to Help</h2>
        <p style="text-align:center; color:#666;">Choose a role and tell us a bit about yourself.</p>

        <form class="contact-form" method="POST" action="{{ route('apply.send') }}">
            @csrf

            <input type="text" name="name" placeholder="Your Full Name" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">

            <select name="role" required>
                <option value="" disabled selected>Which role are you applying for?</option>
                <option value="Role 1 Name">Ambassador</option>
                <option value="Role 2 Name">Finance</option>
                <option value="Role 3 Name">Social Media</option>
                <option value="Role 4 Name">Outreach</option>
                <option value="Volunteer">Volunteer</option>
            </select>

            <textarea name="join_reason" rows="3" required placeholder="Why do you want to join TWC?">{{ old('join_reason') }}</textarea>

            <textarea name="message" rows="5" placeholder="Anything you'd like us to know? (optional)">{{ old('message') }}</textarea>

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
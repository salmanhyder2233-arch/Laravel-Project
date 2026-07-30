@extends('layouts.app')

@section('content')

    <section class="page-header">
        <span class="sparkle sparkle-3">✦</span>
        <span class="sparkle sparkle-1">✦</span>
        <span class="sparkle sparkle-2">✦</span>

        <h1>Contact Us</h1>
        <p>
            We'd love to hear from you. Whether you have questions or ideas, reach out anytime.
        </p>

    </section>

    <section class="contact-section">

        <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
            @csrf

            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
            <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
            <textarea name="message" rows="6" placeholder="Your Message">{{ old('message') }}</textarea>

            <button type="submit" class="btn-primary">Send Message</button>
        </form>

        @if (session('success'))
            <p style="color: green; margin-top: 15px;">{{ session('success') }}</p>
        @endif

        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror

    </section>

@endsection
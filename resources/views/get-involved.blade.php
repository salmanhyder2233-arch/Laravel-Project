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
            <p>03XX-XXXXXXX</p>

            <p><strong>Account Name</strong></p>
            <p>Together We Care</p>

        </div>

        <button id="copyNumber" class="donate-btn">
            Copy Number
        </button>

    </div>

</section>

<section class="confirmation-section">

    <h2>Donation Confirmation</h2>

    <p>
        Already donated? Let us know so we can thank you and keep accurate
        records.
    </p>

    <form class="confirmation-form">

        <input type="text" placeholder="Your Name (Optional)">

        <input type="email" placeholder="Email Address">

        <input type="text" placeholder="Transaction ID">

        <input type="number" placeholder="Donation Amount (PKR)">

        <textarea rows="5" placeholder="Leave a message (Optional)"></textarea>

        <button type="submit" class="donate-btn">
            Submit
        </button>

    </form>

</section>

<script>
const copyBtn = document.getElementById("copyNumber");

copyBtn.addEventListener("click", () => {

    navigator.clipboard.writeText("03XX-XXXXXXX");

    copyBtn.textContent = "Copied!";

    setTimeout(() => {
        copyBtn.textContent = "Copy Number";
    },2000);

});
</script>

@endsection
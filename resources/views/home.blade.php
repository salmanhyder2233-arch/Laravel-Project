@extends('layouts.app')

@section('content')

<section class="hero">

    <!-- Decorations -->
    <div class="sparkle sparkle-1">✦</div>
    <div class="sparkle sparkle-2">✦</div>
    <div class="sparkle sparkle-2-small">✦</div>
    <div class="sparkle sparkle-3">✦</div>

    <img src="{{ asset('images/lily.png') }}" class="lily lily-left" alt="">
    <img src="{{ asset('images/lily.png') }}" class="lily lily-right" alt="">

    <!-- Hero Content -->
    <h1>Welcome to TWC</h1>

    <p>
        Together We Care — making a difference through action.<br>Come join us 
    </p>

    <a href="{{ url('/get-involved') }}" class="btn-primary">
        Help the Cause!
    </a>

</section>
<section class="content-section">

    <div class="content-card">
        <h2>Our Mission</h2>
        <p>Every act of kindness adds up. Learn what drives everything we do.</p>
        <a href="{{ url('/mission') }}" class="btn-primary">Learn More</a>
    </div>

    <div class="content-card">
        <h2>Our Impact</h2>
        <p>See the real difference your support has made so far. Check out the progress we've made together.</p>
        <a href="{{ url('/impact') }}" class="btn-primary">Learn More</a>
    </div>


</section>

@endsection
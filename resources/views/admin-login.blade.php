@extends('layouts.app')

@section('content')
<section class="contact-section">
    <h1 style="text-align:center;">Team Access</h1>

    <form method="POST" action="{{ url('/admin-login') }}" class="contact-form">
        @csrf

        <div class="password-field">
            <input type="password" name="password" id="adminPassword" placeholder="Password">
            <button type="button" id="togglePassword" class="toggle-password-btn">Show</button>
        </div>

        <button type="submit" class="btn-primary">Enter</button>
    </form>

    @error('password')
        <p style="color:#e56f61; text-align:center; margin-top:10px;">{{ $message }}</p>
    @enderror
</section>

<script>
document.getElementById('togglePassword').addEventListener('click', function() {
    const input = document.getElementById('adminPassword');
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    this.textContent = isPassword ? 'Hide' : 'Show';
});
</script>
@endsection
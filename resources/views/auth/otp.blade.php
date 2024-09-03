<form method="POST" action="{{ route('verify.otp') }}">
    @csrf
    <div>
        <label for="otp">OTP</label>
        <input id="otp" type="text" name="otp" required autofocus>
    </div>
    <button type="submit">Verify OTP</button>
</form>

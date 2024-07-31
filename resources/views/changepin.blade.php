<!DOCTYPE html>
<html>

<head>
    <title>Change PIN</title>
</head>

<body>
    <h1>Change PIN</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('changePin') }}" method="POST">
        @csrf
        <label for="cdcno">CDC Number:</label>
        <input type="text" id="cdcno" name="cdcno" required>
        <br>

        <label for="new_spin">New 4-digit PIN:</label>
        <input type="text" id="new_spin" name="new_spin" required maxlength="4" pattern="\d{4}">
        <br>

        <button type="submit">Change PIN</button>
    </form>
</body>

</html>

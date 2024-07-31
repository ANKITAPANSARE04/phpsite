<!DOCTYPE html>
<html>

<head>
    <title>CDC Number Validation</title>
</head>

<body>
    <h1>Enter CDC Number</h1>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('validateCdc') }}" method="POST">
        @csrf
        <label for="cdcno">CDC Number:</label>
        <input type="text" id="cdcno" name="cdcno" required>
        <br>
        <button type="submit">Validate</button>
    </form>
</body>

</html>

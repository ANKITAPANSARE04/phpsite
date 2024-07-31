<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <title>API Integration</title>
</head>

<body>

    <div class="text-center bg-secondary text-white py-1 my-5">
        @if (session('success'))
            {{-- <p>{{ session('success') }}</p> --}}
            @if (session('data.message'))
                <p> {{ session('data.message') }}</p>
            @endif
        @endif <!-- Display the message -->
        @if (session('msg'))
            <p>{{ session('msg') }}</p>
        @endif


        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif
    </div>

    <div class="container my-5 border rounded p-5">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label class="col-3" for="cdcno">CDC Number:</label>
            <input class="w-10- my-2 border rounded" type="text" id="cdcno" name="cdcno" required>
            <br>

            <label class="col-3" for="spin">4-digit PIN:</label>
            <input class="w-10- my-2 border rounded" type="text" id="spin" name="spin" required
                maxlength="4" pattern="\d{4}">
            <br>
            <a href="/change-pin">Forgot pin!!</a>
            <br><br>
            <button type="submit">Login</button>
        </form>


    </div>

</body>

</html>

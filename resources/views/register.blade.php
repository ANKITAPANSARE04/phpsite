<!DOCTYPE html>
<html>

<head>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> --}}

    <title>Register</title>
</head>

<body>
    <h1>Registration Form</h1>


    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <!-- Display the CDC number if it exists in the session -->
    @if (session('cdcno'))
        <p>CDC Number: {{ session('cdcno') }}</p>
    @endif

    <form class="d-flex flex-wrap justify-content-center" action="{{ route('registerdone') }}" method="POST">
        @csrf
        <label class="col-3" for="cdcno">CDC Number*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="cdcno" name="cdcno"
            value="{{ session('cdcno') }}" required>
        <br>

        <label class="col-3" for="ishsno">ISHS Number*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="ishs_no" name="ishs_no"
            placeholder="Enter ISHS Number" required>
        <br>

        <label class="col-3" for="regno">Registration Number*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="regn_no" name="regn_no" value="202005123456"
            required disabled>
        <br>

        <label class="col-3" for="firstname">First Name*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="first_name" name="first_name"
            placeholder="Enter First Name" required>
        <br>

        <label class="col-3" for="middlename">Middle Name:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="middle_name" name="middle_name"
            placeholder="Enter Middle Name">
        <br>

        <label class="col-3" for="lastname">Last Name*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="last_name" name="last_name"
            placeholder="Enter Last Name" required>
        <br>

        <label class="col-3" for="permanent_phone">Permanent Phone Number*:</label>
        <input class="col-8 my-2 border rounded px-2" type="number" id="permanent_mobile" name="permanent_mobile"
            placeholder="Enter Phone Number" required>
        <br>

        <label class="col-3" for="alternate_phone">Permanent Landline Number:</label>
        <input class="col-8 my-2 border rounded px-2" type="number" id="permanent_phone" name="permanent_phone"
            placeholder="Enter Phone Number">
        <br>

        <label class="col-3" for="email">Email id*:</label>
        <input class="col-8 my-2 border rounded px-2" type="email" id="permanent_email" name="permanent_email"
            placeholder="Enter Email id" required>
        <br>

        <!-- Rank Dropdown -->
        <label class="col-3" for="rank">Rank:</label>
        <select name="rank_id" required class="col-8 my-2 border rounded px-2" id="rank" name="rank">
            <option value="" selected>Select Rank</option>
            @foreach ($ranks as $rank)
                <option value="{{ $rank['rank_id'] }}">{{ $rank['rank_name'] }}</option>
            @endforeach
        </select>
        <br>

        <!-- Department Dropdown -->
        <label class="col-3" for="department">Department:</label>
        <select name="department_id" required class="col-8 my-2 border rounded px-2" id="department" name="department">
            <option value="" selected>Select Department</option>
            @foreach ($departments as $department)
                <option value="{{ $department['department_id'] }}">{{ $department['department_name'] }}</option>
            @endforeach
        </select>
        <br>

        <label class="col-3" for="gender">Gender*:</label>
        <select name="gender" required class="col-8 my-2 border rounded px-2" id="gender" name="gender">
            <option value="" selected>Select Gender</option>
            <option value="1">Men</option>
            <option value="2">Women</option>
            <option value="3">Other</option>
        </select>
        <br>

        <label class="col-3" for="dob">Date of Birth*:</label>
        <input class="col-8 my-2 border rounded px-2" type="date" id="dob" name="dob" required>
        <br>

        <label class="col-3" for="permanent_address1">Permanent Address Line1*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="permanent_add_1" name="permanent_add_1"
            placeholder="Enter Permanent Address Line1" required>
        <br>

        <label class="col-3" for="permanent_address2">Permanent Address Line2:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="permanent_add_2" name="permanent_add_2"
            placeholder="Enter Permanent Address Line2">
        <br>

        <label class="col-3" for="permanent_address3">Permanent Address Line3:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="permanent_add_3" name="permanent_add_3"
            placeholder="Enter Permanent Address Line3">
        <br>

        <!-- State Dropdown -->
        <label class="col-3" for="state">State:</label>
        <select name="permanent_state_id" required class="col-8 my-2 border rounded px-2" id="state"
            name="state">
            <option value="" selected>Select State</option>
            @foreach ($states as $state)
                <option value="{{ $state['state_id'] }}">{{ $state['state_name'] }}</option>
            @endforeach
        </select>
        <br>
        <label class="col-3" for="city">City*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="permanent_city" name="permanent_city"
            placeholder="Enter City Name" required>
        <br>

        <label class="col-3" for="pincode">Pincode*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="permanent_pincode" name="permanent_pincode"
            placeholder="Enter Pincode" required>
        <br>
        <label class="col-3" for="pincode">Password*:</label>
        <input class="col-8 my-2 border rounded px-2" type="text" id="NEW_SPIN" name="NEW_SPIN"
            placeholder="Enter Pincode" required>
        <small>4 digit password</small>
        <br>

        {{-- <label class="col-3" for="pincode">Photo*:</label>
        <input class="col-8 my-2 border rounded px-2" type="file" id="photo" name="photo" required>
        <br>
        <label class="col-3" for="pincode">signature*:</label>
        <input class="col-8 my-2 border rounded px-2" type="file" id="signature" name="signature" required>
        <br> --}}

        <input type="hidden" name="step" value="2">
        <div class="col-12 text-center">
            <button type="submit">Register</button>
        </div>
    </form>
</body>

</html>

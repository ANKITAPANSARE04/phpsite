<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
</head>

<body>
    <h1>User Details</h1>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif


    Welcome user
    {{-- <table>
        <tr>
            <td>CDC Number:</td>
            <td>{{ $sailorData['cdc_no'] }}</td>
        </tr>
        <tr>
            <td>ISHS Number:</td>
            <td>{{ $sailorData['ishs_no'] }}</td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td>{{ $sailorData['first_name'] }}</td>
        </tr>
        <tr>
            <td>Middle Name:</td>
            <td>{{ $sailorData['middle_name'] }}</td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>{{ $sailorData['last_name'] }}</td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td>{{ $sailorData['dob'] }}</td>
        </tr>
        <tr>
            <td>Department:</td>
            <td>{{ $sailorData['department'] }}</td>
        </tr>
        <tr>
            <td>Rank:</td>
            <td>{{ $sailorData['rank'] }}</td>
        </tr>
        <tr>
            <td>Last Voyage Date:</td>
            <td>{{ $sailorData['last_voyage_date'] }}</td>
        </tr>
        <tr>
            <td>Photo:</td>
            <td><img src="{{ asset('storage/' . $sailorData['photo']) }}" alt="Photo"></td>
        </tr>
        <tr>
            <td>Permanent Address 1:</td>
            <td>{{ $sailorData['permanent_add_1'] }}</td>
        </tr>
        <tr>
            <td>Permanent Address 2:</td>
            <td>{{ $sailorData['permanent_add_2'] }}</td>
        </tr>
        <tr>
            <td>City:</td>
            <td>{{ $sailorData['permanent_city'] }}</td>
        </tr>
        <tr>
            <td>Pincode:</td>
            <td>{{ $sailorData['permanent_pincode'] }}</td>
        </tr>
        <tr>
            <td>State:</td>
            <td>{{ $sailorData['permanent_state_id'] }}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{{ $sailorData['permanent_phone'] }}</td>
        </tr>
        <tr>
            <td>Mobile:</td>
            <td>{{ $sailorData['permanent_mobile'] }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $sailorData['permanent_email'] }}</td>
        </tr>
    </table> --}}
</body>

</html>

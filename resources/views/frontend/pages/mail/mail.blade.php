<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT YOUR BOOKING</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #009688;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>ABOUT YOUR BOOKING</h1>
    <table>
        <tr>
            <th>Name Customer</th>
            <th>Capacity</th>
            <th>Name Room</th>
            <th>Price</th>
            <th>Type Room</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>{{ $data['body']['nameUser'] }}</td>
            <td>Max persion {{ $data['body']['capacity'] }}</td>
            <td>{{ $data['body']['nameRoom'] }}</td>
            <td>{{ $data['body']['price'] }}$/Pernight</td>
            <td>{{ $data['body']['typeroom'] }}</td>
            <td>{{ $data['body']['checkIn'] }}</td>
            <td>{{ $data['body']['checkOut'] }}</td>
            <td>{{ $data['body']['total'] }}$</td>
        </tr>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>websitepercobaan.com</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            font-weight: bold;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $details['title'] }}</h1>
        <table>
            <tr>
                <th>Bahan Produk</th>
                <td>{{ $details['bahan'] }}</td>
            </tr>
            <tr>
                <th>Model Produk</th>
                <td>{{ $details['model'] }}</td>
            </tr>
            <tr>
                <th>Warna Produk</th>
                <td>{{ $details['warna'] }}</td>
            </tr>
            <tr>
                <th>Seri Produk</th>
                <td>{{ $details['seri'] }}</td>
            </tr>
        </table>
        <p>Terima Kasih</p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            /* background-color: #f9f9f9; */
            font-size: 10px
        }

        h2 {
            margin-bottom: 20px;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .stock-table2 {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .stock-table thead th {
            /* background-color: #626465; */
            /* color: white; */
            text-align: center;
            /* padding: 10px; */
            border: 1px solid #ccc;
        }

        .stock-table tbody td {
            /* padding: 8px; */
            text-align: center;
            border: 1px solid #ccc;
        }

        .stock-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .stock-table tbody tr:hover {
            background-color: #e0f7fa;
        }

        .stock-table th,
        .stock-table td {
            min-width: 20px;
        }


        .table-header tr td {
            text-align: left
        }
    </style>
</head>

<body onload="print()">

    <h3 style="margin-bottom:20px !important;font-size:15px !important">Product Report</h3>

    <table width="100%" style="border-collapse: collapse; margin-bottom: 10px;">
        <tr>
            <td style="vertical-align: top; text-align: left;">
                <table class="table-header">
                    <tr>
                        <td style="margin:0;padding:0">Company Name</td>
                        <td>:</td>
                        <td>PT. Toho Technology Indonesia</td>
                    </tr>
                    <tr>
                        <td style="margin:0;padding:0">Category</td>
                        <td>:</td>
                        <td>{{ $category ? $category->name : '-' }}</td>
                    </tr>
                    <tr>
                        <td style="margin:0;padding:0">Date</td>
                        <td>:</td>
                        <td>{{ Carbon\Carbon::now()->translatedFormat('d-m-Y H:i:s') }}</td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: top; text-align: right;">
                <img src="{{ public_path('assets/images/logo-toho.png') }}" style="max-height: 50px;" alt="">
            </td>
        </tr>
    </table>


    <table class="stock-table">
        <thead>
            <tr>
                <th style="width:5px !important">No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Description</th>
                <th>Department</th>
                <th>Qty</th>
                <th>Area</th>
                <th>Rack</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td style="width:5px !important">{{ $loop->iteration }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->unit->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->department->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->area->name ?? '-' }}</td>
                    <td>{{ $item->rack->name ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;padding:5px 0;">Product Not Found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
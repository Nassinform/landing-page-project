<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sheets Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:hover {background-color: #f1f1f1;}
    </style>
</head>
<body>
    <h1>Google Sheets Data</h1>
    @if(isset($error))
        <p>Error: {{ $error }}</p>
    @else
        <table>
            <thead>
                <tr>
                    @foreach ($header as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($valuesArray as $index => $row)
                    <tr data-index="{{ $index }}">
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="details" style="display:none; margin-top: 20px;">
            <h2>Détails</h2>
            <p id="details-content"></p>
        </div>
    @endif

    <script>
        document.querySelectorAll('tr[data-index]').forEach(row => {
            row.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const details = @json($valuesArray);
                document.getElementById('details-content').innerText = JSON.stringify(details[index], null, 2);
                document.getElementById('details').style.display = 'block';
            });
        });
    </script>
</body>
</html>

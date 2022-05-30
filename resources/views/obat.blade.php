<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <center>
            <h2>Detil Resep</h2>
        </center>
        <br />
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Nama Signa</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($obat as $o)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$o->obat}}</td>
                    <td>{{$o->signa}}</td>
                    <td>{{$o->stok}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
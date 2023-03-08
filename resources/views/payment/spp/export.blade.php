<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kwitansi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .bg {
            background-color: rgba(255, 231, 154, 0.801);
            width: 100%;
            height: max-content;  
            margin-right: 30px;
            margin-left: 40px;
            padding: 20px;
            border-radius: 10px;
        }
        .title {
            display: flex;
            flex-wrap: nowrap;
        }
        .hero-title {
            margin-right: 50%;
            font-weight: bold;
            font-size: 30px;
        }
        .date {
           justify-content: flex-end;
           font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="title">
            <span class="hero-title">SMK PEMKAB PONOROGO</span>
            <span class="date">{{ now()->toDateString()}}</span>
            <hr>
        </div>
        <div class="content">
            <table style="width:100%">
                <tr>
                  <th>Code Transaksi:</th>
                  <td>{{ $pay->code_pay}}</td>
                </tr>
                <tr>
                  <th>Nama Siswa:</th>
                  <td>{{ $pay->siswa->nama}}</td>
                </tr>
                <tr>
                  <th>NISN:</th>
                  <td>{{ $pay->siswa->nisn}}</td>
                </tr>
                <tr>
                  <th>SPP Tahunan:</th>
                  <td>{{ $pay->spp->tahun}} | {{ toRupiah( $pay->spp->nominal)}}</td>
                </tr>
                <tr>
                  <th>Keterangan:</th>
                  <td>{{ $pay->pembayaran->keterangan}}</td>
                </tr>
                <tr>
                  <th>Lain Lain:</th>
                  <td>{{ $pay->pembayaran->lain_lain}}</td>
                </tr>
              </table>
              <hr>
        </div>
    </div>
</body>
</html>
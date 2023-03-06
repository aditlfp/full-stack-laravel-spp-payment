<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment PDF</title>
</head>
<body>

    @if ($pay)
    
        <div class="title">
            <h3>Spp Yang Lunas <span>{{ now()->toDateString()}}</span></h3>
        </div>
    
       
    @endif

    <table class="table-auto text-center">
        <thead>
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Petugas</th>
                <th class="px-4 py-2 border">NISN / Siswa</th>
                <th class="px-4 py-2 border">Tanggal Bayar</th>
                <th class="px-4 py-2 border">Spp Tahunan</th>
                <th class="px-4 py-2 border">Keterangan</th>
            </tr>
        </thead>

        <tbody>
            <tbody>
                @php
                  $no = 1
                @endphp
  
                @forelse( $pay as $s)
                  <tr>
                    <td class="border px-4 py-2">{{ $no++}}</td>
                    <td class="border px-4 py-2">{{ $s->petugas->nama_petugas}}</td>
                    <td class="border px-4 py-2">{{ $s->siswa->nisn}} / {{ $s->siswa->nama}}</td>
                    <td class="border px-4 py-2">{{ $s->tgl_bayar}}</td>
                    <td class="border px-4 py-2">{{ $s->spp->tahun}} / {{ toRupiah($s->spp->nominal)}}</td>
  
                    <td class="border px-4 py-2">
                      @if ($s->keterangan === 'Lunas')
                          <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->keterangan}}</span>
                      @elseif ($s->keterangan === '-')
                          <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">Lunas</span>
                      @else
                          <span class="bg-[#FD841F] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md"> {{ $s->keterangan}}</span>
                      @endif
                  </td>
                  @empty
                  <td colspan="6">Kosong</td>
                  </tr>
                @endforelse
            </tbody>
    </table>

    @if($paynt)
        
        <div class="title"  style="margin-top: 40px">
            <h3>Spp Yang Belum Lunas <span>{{ now()->toDateString()}}</span></h3>
        </div>

    @endif

    {{-- Belum Lunas --}}
    <table class="table-auto text-center" style="margin-top: 10px">
        <thead>
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Petugas</th>
                <th class="px-4 py-2 border">NISN / Siswa</th>
                <th class="px-4 py-2 border">Tanggal Bayar</th>
                <th class="px-4 py-2 border">Spp Tahunan</th>
                <th class="px-4 py-2 border">Keterangan</th>
            </tr>
        </thead>

        <tbody>
            <tbody>
                @php
                  $no = 1
                @endphp
  
                @forelse( $paynt as $s)
                  <tr>
                    <td class="border px-4 py-2">{{ $no++}}</td>
                    <td class="border px-4 py-2">{{ $s->petugas->nama_petugas}}</td>
                    <td class="border px-4 py-2">{{ $s->siswa->nisn}} / {{ $s->siswa->nama}}</td>
                    <td class="border px-4 py-2">{{ $s->tgl_bayar}}</td>
                    <td class="border px-4 py-2">{{ $s->spp->tahun}} / {{ toRupiah($s->spp->nominal)}}</td>
  
                    <td class="border px-4 py-2">
                      @if ($s->keterangan === 'Lunas')
                          <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->keterangan}}</span>
                      @elseif ($s->keterangan === '-')
                          <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">Lunas</span>
                      @else
                          <span class="bg-[#FD841F] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md"> {{ $s->keterangan}}</span>
                      @endif
                  </td>
                  @empty
                  <td colspan="6">Kosong</td>
                  </tr>
                @endforelse
            </tbody>
    </table>
</body>
</html>
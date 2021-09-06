<!doctype html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Buku Alumni</title>
  <style type="text/css">
    * {
      font-family: Verdana, Arial, sans-serif;
    }
    table{
      font-size: x-small;
    }
    tfoot tr td{
      font-weight: bold;
      font-size: x-small;
      
    }
    .gray {
      background-color: #34a1eb;
    }
    pre {
      text-align: left;
      white-space: pre-line;
    }
  </style>
</head>


<body>
  @if($album->gambar_album != null)

<img src="{{ ('Akademik-Album/'. $album->gambar_album) }}" alt="" width="100%"/ style="padding-bottom: 10em; padding-top: 10em">
@else
<img src="{{ ('Poliwangi_Logo.png') }}" alt="" width="100%"/ style="padding-bottom: 10em; padding-top: 10em">
    @endif

 @foreach($prodi as $prodis)
  @if($album->header_album != null)
  <table width="100%" style="background-image: url('{{ ('Akademik-Album-Header/'. $album->header_album) }} '); margin-bottom: -1em">
    @else
  <table width="100%" style="background-image:  url('{{ ('1630190887.Desert.jpg') }} '); margin-bottom: -1em">
    @endif
    <tr>
        
            <td align="left" width="30%"><img src="{{ ('Poliwangi_Logo.png') }}" alt="" width="150"/> </td>
            <td width="70%"><h2>{{$prodis->nama_prodi}}</h2></td>
       
    </tr>

  </table>
  
  <table width="100%" style="text-transform: uppercase;" >
    
    <tbody >
      @if($mahasiswa->count() >= 1)

      @foreach($mahasiswa as $mahasiswas)
      @if($mahasiswas->prodi != $prodis->nama_prodi)

      @else
      <tr>
        @if($mahasiswas->foto == null)
        <td style="margin-left: 1em;padding-bottom: 2em;">  <img src="{{ ('Poliwangi_Logo.png') }}" style="max-width: 230px; max-height: 150px;"> 
        </td>
        @else
        <td style="margin-left: 1em;padding-bottom: 2em;">  <img src="{{ ('Foto-Mahasiswa/'.$mahasiswas->foto) }}" style="max-width: 230px; max-height: 150px;"> 
        </td>
        @endif
        <td style="padding-right: 9em;padding-bottom: 2em;">NIM : {{ $mahasiswas->nim }}<br>
          Nama : {{ $mahasiswas->nama }}<br>
          Tempat/Tanggal Lahir  : {{ $mahasiswas->tempat_lahir }}, {{Carbon\Carbon::parse($mahasiswas->tanggal_lahir)->translatedFormat('d F Y') }}<br>
          Jenis Kelamin : {{ $mahasiswas->jenis_kelamin }}<br>
          Prodi : {{ $mahasiswas->prodi }}<br>
          Alamat : {{ \Illuminate\Support\Str::limit($mahasiswas->alamat, 30, $end='...') }}<br>
          Telepon :{{ $mahasiswas->telepon  }}<br>
          Lama Studi : {{ $mahasiswas->lama_studi }}<br>
          Judul TA : {{ $mahasiswas->judul_laporan }} <br>
          Judul TA : {{ \Illuminate\Support\Str::limit($mahasiswas->judul_laporan, 30, $end='...') }}<br>
          IPK : {{ $mahasiswas->ipk }}</td><br>
       

        </tr>

        @endif         
        @endforeach
        @else
        @endif
      </tbody>

      
    </table>

  </body>

    <div style="page-break-after: always;"></div>

@endforeach

  </html>

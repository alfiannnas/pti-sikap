<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Rekap Presensi Bulanan</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    #judul {
      font-family: Helvetica, sans-serif;
      font-weight: bold;
      font-size: 20px;
    }
    .tablepresensi{
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    .tablepresensi tr th {
      border: 1px solid black;
      background-color: lightgrey; 
    }

    .tablepresensi tr td {
      border: 1px solid black;
      font-size: 10px;
      padding: 5px;
    }

    .container {
      display: flex;
      flex-direction: column;
    }

    /* Hide print button in print mode */
    @media print {
      .btn-print {
        display: none;
      }
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%;" >
      <tr>
        <td style="width: 30px; height: 30px;">
          <img style="margin-right:20px;" src="{{ asset('assets/img/pt-rab.png') }}" width="120">
        </td>
        <td> 
          <span id='judul'>
            PT. Ressa Abadi Bersama<br>
            Laporan Presensi Karyawan Bulan {{ $namabulan[$bulan] }} {{ $tahun }}
          </span><br>
          <span style="line-height: 5px;">Jl. Soekarno Hatta No. 28, Tanjung Seneng, Bandar Lampung</span>
        </td>
      </tr>
    </table>
    <table class="tablepresensi">
      <thead>
        <tr>
          <th>NIK</th>
          <th>Nama Karyawan</th>
          @for ($day = 1; $day <= 31; $day++)
            <th>{{ $day }}</th>
          @endfor
        </tr>
      </thead>
      <tbody>
        @foreach ($presensi as $data)
        <tr>
          <td>{{ $data->nik }}</td>
          <td>{{ $data->nama }}</td>
          <!-- Add day data here -->
          @for ($day = 1; $day <= 31; $day++)
              <td>
                @if ($data->attendedOnDay($tahun, $bulan, $day, $data->nik))
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                  </svg>
                
                @elseif ($data->lateOnDay($tahun, $bulan, $day, $data->nik))
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-letter-t" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path style="stroke: red;" d="M6 4l12 0" />
                    <path style="stroke: red;" d="M12 4l0 16" />
                    <path d="M12 4l0 16" />
                  </svg>

                @elseif ($izin->permittedOnDay($tahun, $bulan, $day, $data->nik))
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="red" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                  </svg>

                @else
                    <!-- Empty box symbol -->
                @endif
              </td>
          @endfor
        </tr>
        @endforeach
      </tbody>
    </table>
    <p>Keterangan</p>
    <div class="container">
      <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l5 5l10 -10"></path>
      </svg>
      <span>Hadir</span>
      </div>
      <div style="margin-top:20px;margin-bottom:20px">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="red" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l5 5l10 -10"></path>
      </svg>
      <span>Cuti</span>
      </div>
    </div>
    <button id="printButton" class="btn btn-primary btn-print">Cetak Laporan</button>
  </section>

<script>
  document.getElementById('printButton').addEventListener('click', function() {
    window.print();
  });

  document.addEventListener('keydown', function(event) {
    if (event.ctrlKey && event.key === 'p') {
      event.preventDefault();
      window.print();
    }
  });
</script>
</body>

</html>
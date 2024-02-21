{{-- <table>
    <tbody>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">DATA BUKU</td>
        </tr>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">Waktu Export : {{date('d-m-Y H:i')}}</td>
        </tr>
    </tbody>
</table> --}}
<table>
    <thead>
    <tr>
        <th style="font-weight:bold;text-align:center;background:#1cc7de;border:1px solid #000000;">No</th> <!-- kolom A -->
        <th style="font-weight:bold;text-align:center;background:#1cc7de;border:1px solid #000000;">Judul</th> <!-- kolom B -->
        <th style="font-weight:bold;text-align:center;background:#1cc7de;border:1px solid #000000;">Penulis</th> <!-- kolom C -->
        <th style="font-weight:bold;text-align:center;background:#1cc7de;border:1px solid #000000;">Penerbit</th> <!-- kolom D -->
        <th style="font-weight:bold;text-align:center;background:#1cc7de;border:1px solid #000000;">Tahun Terbit</th> <!-- kolom E -->
    </tr>
    </thead>
    <tbody>
    @php $no=1; @endphp
    @if(count($data))
    @foreach($data as $dt)
        <tr>
            <td style="font-weight:bold;text-align:center;border:1px solid #000000;">{{$no++}}</td>
            <td style="font-weight:bold;text-align:center;border:1px solid #000000;">{{$dt->judul??''}}</td>
            <td style="font-weight:bold;text-align:center;border:1px solid #000000;">{{$dt->penulis??''}}</td>
            <td style="font-weight:bold;text-align:center;border:1px solid #000000;">{{$dt->penerbit??''}}</td>
            <td style="font-weight:bold;text-align:center;border:1px solid #000000;">{{$dt->tahun_terbit??''}}</td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>
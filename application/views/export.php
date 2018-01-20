<?php
//header info for browser


header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=rekappemesanan.xls");
header("Pragma: no-cache");
header("Expires: 0");

//print_r($data);
?>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

<?php
echo "<table>";
?>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Ruang</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Pemakai</th>
            <th>Nama Instansi</th>
            <th>Telefon</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
<?php
foreach ($data as $d){
    echo "<tr>";
    echo "<td>$d->tanggal</td>";
    echo "<td>$d->nama</td>";
    echo "<td>$d->jam_mulai</td>";
    echo "<td>$d->jam_selesai</td>";
    echo "<td>$d->pemakai</td>";
    echo "<td>$d->instansi</td>";
    echo "<td>$d->telp</td>";
    echo "<td>$d->keterangan</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
<?php
require_once __DIR__ .'/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
include('./config.php');
$no = 1;
     $tabledata = "";
     $data = mysqli_query($mysqli," SELECT * FROM datanilai");
     while($row = mysqli_fetch_array($data))
     {
        $tabledata .= "
        <tr>
              <td>".$row["nis"]."</td>
              <td>".$row["nama_lengkap"]."</td>
              <td>".$row["jenis_kelamin"]."</td>
              <td>".$row["kelas"]."</td>
              <td>".$row["kehadiran"]."</td>
              <td>".$row["tugas"]."</td>
              <td>".$row["pts"]."</td>
              <td>".$row["pas"]."</td>
        <tr>      
              ";
              $no++;
     }
     $waktu_cetak = date('d M Y - H:i:s');

     $table = "
     <h1>Laporan Data Diri</h1>
     <h6>Waktu cetak : $waktu_cetak</h6>
     <table  width='100%' cellpadding=5 border=1 cellspacing=0>
              <tr>
                   <th>NIS</th>
                   <th>NAMA LENGKAP</th>
                   <th>JENIS KELAMIN</th>
                   <th>KELAS</th>
                   <th>KEHADIRAN</th>
                   <th>TUGAS</th>
                   <th>PTS</th>
                   <th>PAS</th>
               <tr>
               $tabledata
               </table>    
        ";

$mpdf->WriteHTML($table);
$mpdf->Output();
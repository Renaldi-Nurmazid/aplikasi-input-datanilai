<?php
     include('./config.php');
     if ($_SESSION["login"] != TRUE){
      header('location:login.php');
     }
     echo "<div class='container'>";
     echo "Selamat Datang, ".$_SESSION["username"]."<br>";
     echo "Anda Sebagai: ".$_SESSION["role"]." - ";

     echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
     echo "<hr>";
     echo "<a class='btn btn-sm btn-primary'  href='input-tambah.php'>Tambah Data</a>";
     echo " - ";
     echo "<a class='btn btn-sm btn-warning' href='input-pdf.php'>Cetak PDF</a>";
     echo "<hr>";
     //Menampilkan data dari database

     $no = 1;
     $tabledata = "";
     $data = mysqli_query($mysqli," SELECT * FROM datanilai");
     while($row = mysqli_fetch_array($data))
     {
      $totalnolai=($row["kehadiran"]+$row["tugas"]+$row["pts"]+$row["pas"]);
      $rata_rata = ($totalnolai / 4);
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
              <td>".$rata_rata."</td>
              <td>
              <a class='btn btn-sm btn-success' href='input-edit.php?nis=".$row["nis"]."'>Edit</a>
              &nbsp;-&nbsp;
              <a class='btn btn-sm btn-danger' href='input -delete.php?nis=".$row["nis"]."'
              onclick='return confirm(\"Yakin Hapus ?\");'>Hapus</a>
              </td>
        <tr>      
              ";
              $no++;
     }

     echo "
     <table class='table table-dark table-bordered table-striped'>
              <tr>
                   <th>NIS</th>
                   <th>NAMA LENGKAP</th>
                   <th>JENIS KELAMIN</th>
                   <th>KELAS</th>
                   <th>NILAI KEHADIRAN</th>
                   <th>NILAI TUGAS</th>
                   <th>NILAI PTS</th>
                   <th>NILAI PAS</th>
                   <th>NILAI RATA-RATA</th>
                   <th>AKSI</th>
               <tr>
               $tabledata
               </table>    
        ";
        echo "</div>";
?>
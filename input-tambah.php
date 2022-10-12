<div class="container">
<h1>Tambah Data</h1>
<form action="input-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa:</label>
    <input class="form-control" type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="nama_lengkap">Nama Lengkap :</label>
    <input class="form-control" type="text" name="nama_lengkap" placeholder="Ex. Renaldi Nurmazid" /><br>

    <label for="jenis_kelamin">Jenis Kelamin :</label>
    <input class="form-control" type="text" name="jenis_kelamin" placeholder="Ex. Laki-laki"/><br>

    <label for="kelas">Kelas :</label>
    <input class="form-control" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>

    <label for="kehadiran">Nilai Kehadiran :</label>
    <input class="form-control" type="text" name="kehadiran" placeholder="Ex. 90" /><br>

    <label for="tugas">Nilai Tugas :</label>
    <input class="form-control" type="text" name="tugas" placeholder="Ex. 90" /><br>

    <label for="pts">Nilai PTS :</label>
    <input class="form-control" type="text" name="pts" placeholder="Ex. 90" /><br>

    <label for="pas">Nilai PAS :</label>
    <input class="form-control" type="text" name="pas" placeholder="Ex. 90" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-data.php">Kembali</a>
</form>    
</div>

<?php 
     include('./config.php');
     if ( $_SESSION["login"] != TRUE) {
         header('location:login.php');
     }
      if ( $_SESSION["role"] != "admin" ) {
        echo "
        <script>
            alert('Akses tidak diberikan, Kamu Bukan Admin');
            window.location='input-data.php';
        </script>
        ";
      }

    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $jenis_kelamin = $_POST["jenis_kelamink"];
        $kelas = $_POST["kelas"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $pts = $_POST["pts"];
        $pas = $_POST["pas"];

        //CREATE - Menammbahkan Data ke Database
        $query = "
            INSERT INTO datanilai VALUES
            ('$nis','$nama_lengkap','$jenis_kelamin','$kelas',' $kehadiran','$tugas',' $pts',' $pas');
         ";

        
         $insert = mysqli_query($mysqli, $query);

         if ($insert){
                echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-data.php';
                </script>
            ";
         }

    }
    ?>
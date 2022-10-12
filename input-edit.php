<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis';";
        include('./config.php');
        $querry = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-edit.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="nama_lengkap"> Nama Lengkap :</label>
    <input class="form-control" value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Renaldi Nurmazid" /><br>

    <label for="jenis_kelamin"> Jenis Kelamin :</label>
    <input class="form-control" value="<?php echo $row["jenis_kelamin"]; ?>" type="text" name="jenis_kelamin" /><br>

    <label for="kelas"> Kelas :</label>
    <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>
   
    <label for="kehadiran"> Nilai Kehadiran :</label>
    <input class="form-control" value="<?php echo $row["kehadiran"]; ?>"  type="number" name="kehadiran" placeholder="Ex. 80" /><br>
   
    <label for="tugas"> Nilai Tugas :</label>
    <input class="form-control" value="<?php echo $row["tugas"]; ?>"  type="number" name="tugas" placeholder="Ex. 80" /><br>
  
    <label for="pts"> Nilai PTS :</label>
    <input class="form-control" value="<?php echo $row["pts"]; ?>" type="number" name="pts" placeholder="Ex. 90" /><br>
   
    <label for="pas"> Nilai PAS :</label>
   <input class="form-control" value="<?php echo $row["pas"]; ?>" type="number" name="pas" placeholder="Ex. 80" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-data.php">kembali</a>
</form>
<?php
    if ( isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kelas = $_POST["kelas"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $pts = $_POST["pts"];
        $pas = $_POST["pas"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE datanilai SET nama_lengkap = '$nama_lengkap',
            jenis_kelamin = '$jenis_kelamin',
            kelas = '$kelas',
            kehadiran = '$kehadiran',
            tugas = '$tugas',
            pts = '$pts',
            pas = '$pas'
            WHERE nis = '$nis';
        ";
        include ('./config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-data.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>
<div class="container">
<h1 class="text-center">Form Login</h1>
<form action="login.php" method="POST" class="w-50 mx-auto">
    <label >Username</label><br>
    <input class="form-control" type="text" name="username" placeholder="Ex. renldnrmzd" />
    <br>
    <label>password</label><br>
    <input class="form-control" type="password" name="password" placeholder="Ex. ---" />
    <br>
    <a href="registrasi.php"><h5>Belum punya akun?</h5></a>
    <br>
    <input class="form-control btn btn-primary" type="submit" name="login" value="Masuk" />
</form>

<?php
    include("./config.php");
    if( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM akun
        WHERE username='$username' AND password=MD5('$password'); ";
        $data = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_array($data);

            $_SESSION["login"] =TRUE;
            $_SESSION["akun_id"] =$row["akun_id"];
            $_SESSION["username"] =$row["username"];
            $_SESSION["role"] =$row["role"];
            
            echo "
            <script>
            alert('Login Berhasil');
            window.location='input-data.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Akun tidak ditemukan, coba lagi');
            window.location='login.php';
            </script>";
        }
    }
?>
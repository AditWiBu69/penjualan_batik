<?php
session_start();

if (isset($_SESSION["customer"])) {
    header("Location: ../../../../Client/Customer/customer.php");
} elseif (isset($_SESSION["admin"])) {
    header("Location: ../../../../Client/Admin/admin.php");
}
// Koneksi ke database
require '../../index.php';

// Fungsi untuk melakukan login
function login($username, $password)
{
    global $conn;

    // Melakukan sanitasi input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk mencari user berdasarkan username dan password
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $verif = password_verify($password, $user["password"]);
        if ($verif) {
            // Redirect ke halaman sesuai level user
            if ($user['level'] == 'admin') {
                $_SESSION["admin"] = true;
                $_SESSION["user"] = $username;
                $_SESSION["id_user"] = $user["id"];
                header('Location: ../../../../Client/Admin/admin.php');
                exit();
            } elseif ($user['level'] == 'customer') {
                $_SESSION["customer"] = true;
                $_SESSION["user"] = $username;
                $_SESSION["id_user"] = $user["id"];
                header('Location: ../../../../Client/Customer/customer.php');
                exit();
            }

            exit;
        }
    } else {
        echo "<script>
                    alert('Wrong Username or Password')
                </script>";
    }
}

// Contoh penggunaan fungsi login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}

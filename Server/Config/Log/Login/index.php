<?php
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
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Redirect ke halaman sesuai level user
        if ($user['level'] == 'admin') {
            header('Location: ../../../../Client/Admin/admin.php');
            exit();
        } elseif ($user['level'] == 'customer') {
            header('Location: ../../../../Client/Customer/customer.php');
            exit();
        }
    } else {
        echo "Username atau password salah.";
    }
}

// Contoh penggunaan fungsi login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}
?>
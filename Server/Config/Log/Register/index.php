<?php
require '../../index.php';


// Fungsi untuk melakukan registrasi
function register($username, $password, $confirmPassword)
{
    global $conn;

    // Melakukan validasi data

    $sameUsername = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($sameUsername)) {
        echo "<script>
                    alert('Username has been registered')
                </script>";
        return false;
    }

    if ($confirmPassword !== $password) {
        echo "<script>
                    alert('Password doesnot same')
                </script>";
        return false;
    }



    // Mengenkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Menyimpan data ke database
    $query = "INSERT INTO users (username, password, level) VALUES ('$username', '$hashedPassword', 'customer')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
                    alert('Registration Success')
                </script>";
    } else {
        echo "<script>
                    alert('Registration Failed')
                </script>";
    }
}

// Mengambil data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm'];


    // Memanggil fungsi register
    register($username, $password, $confirmPassword);
}

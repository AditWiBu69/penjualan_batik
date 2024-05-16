<?php 

$conn = mysqli_connect("localhost", "root", "", "batik");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; // Pastikan $rows didefinisikan sebagai array kosong
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>
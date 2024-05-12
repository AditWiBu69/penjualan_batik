<?php

$conn = mysqli_connect("localhost", "root", "", "batik");



function deleteProduct($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM products WHERE id_product = $id");

    return mysqli_affected_rows($conn);
}

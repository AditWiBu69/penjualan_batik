<?php

require '../index.php';

function addProduct($category, $product_name, $size, $stock, $price,$description)
{
    global $conn;

    $foto = upload();

    $query = "INSERT INTO products (`category_id` ,`product_name`, `size`,`stock`,`price`, `photo`,`description` )  VALUES ('$category','$product_name','$size','$stock','$price', '$foto','$description')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "  <script>
                    alert('Product has been Added')
                    window.location.href = '../../../Client/Admin/DataProduct/product.php'
                </script>";
    } else {
        echo "  <script>
                    alert('Failed')
                    window.location.href = '../../../Client/Admin/DataProduct/product.php'
                </script>";
    }
}

function upload()
{
    $namaFile = $_FILES["photo"]["name"];
    $error = $_FILES["photo"]["error"];
    $tmpName = $_FILES["photo"]["tmp_name"];

    //cek apakah ada foto yg di upload atau tidak
    if ($error === 4) {
        echo
        "<script>
                alert('Upload foto terlebih dahulu');
            </script>";
        return false;
    }

    //cek apakah yang di upload foto atau bukan
    $ekstensiFotoValid = ["jpg", "jpeg", "png"];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo
        "<script>
             alert('Upload foto dongg');
         </script>";
        return false;
    }
    //generate nama foto baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;




    move_uploaded_file($tmpName, '../../../Client/Assets/img/product/' . $namaFileBaru);

    return $namaFileBaru;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $size = $_POST['size'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Memanggil fungsi register
    addProduct($category, $product_name, $size, $stock, $price,$description);
}
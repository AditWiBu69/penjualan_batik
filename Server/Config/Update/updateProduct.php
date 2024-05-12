<?php
$conn = mysqli_connect("localhost", "root", "", "batik");

function updatePoduct($id, $category, $product_name, $size, $stock, $price, $description,$old_photo)
{
    global $conn;

    if ($_FILES["photo"]["error"] === 4) {
        $photo = $old_photo;
    } else {
        $photo = upload();
    }

    $query = "UPDATE products SET 
                        category_id = '$category',
                        product_name = '$product_name',
                        size = '$size',
                        stock = '$stock',
                        price = '$price',
                        photo = '$photo',
                        description = '$description'


                         WHERE id_product = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "  <script>
                        alert('Product has been Updated')
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
    $id = $_POST['id'];
    $old_photo = $_POST['old_photo'];
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $size = $_POST['size'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Memanggil fungsi register
    updatePoduct($id, $category, $product_name, $size, $stock, $price, $description,$old_photo);
}

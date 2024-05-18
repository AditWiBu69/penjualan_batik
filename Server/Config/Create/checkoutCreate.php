<?php
require '../index.php';

function checkout($id_user, $id_product, $qty, $total, $no_rek)
{
    global $conn;

    // Mengambil stok produk sebelum checkout
    $stock_query = mysqli_query($conn, "SELECT stock FROM products WHERE id_product = $id_product");
    $stock_data = mysqli_fetch_assoc($stock_query);
    $current_stock = $stock_data['stock'];

    // Mengurangi stok sesuai dengan kuantitas yang dibeli
    $new_stock = $current_stock - $qty;

    // Memperbarui stok produk dalam database
    $update_stock_query = mysqli_query($conn, "UPDATE products SET stock = $new_stock WHERE id_product = $id_product");

    // Jika stok berhasil diperbarui, lakukan checkout
    if ($update_stock_query) {
        // Lakukan operasi checkout
        $foto = upload();
        $query = "INSERT INTO transactions VALUES (NULL, '$id_user', '$id_product', CURDATE(), '$total', '$qty', 'Pending', '$no_rek', '$foto')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                    alert('Checkout Successfully');
                    window.location.href = '../../../Client/Customer/order-history.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed');
                    window.location.href = '../../../Client/Customer/order-history.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Failed to update stock');
                window.location.href = '../../../Client/Customer/order-history.php';
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
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $no_rek = $_POST['no_rek'];

    checkout($id_user, $id_product, $qty, $total, $no_rek);
}

<?php
require "../../../Server/Config/Delete/productDelete.php";

$id = $_GET["id"];

if (deleteProduct($id) > 0) {
    echo
    "<script>
        alert('Product has been deleted');
        window.location.href = 'product.php';
    </script>";
} else {
    echo
    "<script>
        alert('Failed');
        window.location.href = 'product.php';
    </script>";
}

<?php 
require '../index.php';

function addCategory($category)
{
    global $conn;

    $query = "INSERT INTO categories (`category`)  VALUES ('$category')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "  <script>
                    alert('Category has been Added')
                    window.location.href = '../../../Client/Admin/DataCategory/category.php'
                </script>";
    } else {
        echo "  <script>
                    alert('Failed')
                    window.location.href = '../../../Client/Admin/DataCategory/category.php'
                </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];

    // Memanggil fungsi register
    addCategory($category);
}
?>
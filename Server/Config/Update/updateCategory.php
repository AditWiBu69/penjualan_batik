<?php
$conn = mysqli_connect("localhost", "root", "", "batik");

function updateCategory($id, $category)
{
    global $conn;

    $query = "UPDATE categories SET category = '$category' WHERE id_category = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "  <script>
                        alert('Category has been Updated')
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
    $id = $_POST['id'];
    $category = $_POST['category'];

    // Memanggil fungsi register
    updateCategory($id, $category);
}

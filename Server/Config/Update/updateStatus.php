<?php
require '../index.php';

function updateStatus($id_transaction, $status)
{
    global $conn;
    $query = "UPDATE transactions SET status = '$status' WHERE id_transaction = $id_transaction";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "  <script>
                            alert('Status has been Updated')
                            window.location.href = '../../../Client/Admin/DataReport/report.php'
                        </script>";
    } else {
        echo "  <script>
                            alert('Failed')
                            window.location.href = '../../../Client/Admin/DataReport/report.php'
                        </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transaction = $_POST['id_transaction'];
    $status = $_POST['new_status'];

    // Memanggil fungsi register
    updateStatus($id_transaction, $status);
}

<?php 
require '../index.php';

function profile($id_user,$name,$email,$no_telp,$address){  
    global $conn;

    $query = 
    "INSERT biodata (`user_id`,`name`,`email`,`no_telp`,`address`) VALUES ('$id_user','$name','$email','$no_telp','$address')";

    $result = mysqli_query($conn,$query);

    if ($result) {
        echo "  <script>
                    alert('Profile has been Added')
                    window.location.href = '../../../Client/Customer/profile.php'
                </script>";
    } else {
        echo "  <script>
                    alert('Failed')
                    window.location.href = '../../../Client/Customer/profile.php'
                </script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $address = $_POST['address'];

    
    profile($id_user,$name,$email,$no_telp,$address);
}
?>
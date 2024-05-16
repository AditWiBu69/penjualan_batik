<?php
session_start();

require '../../Server/Config/Read/productRead.php';

$products = query('SELECT id_product,product_name,description,photo FROM products');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Halaman Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="../Assets/css/dashboard.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicons -->
    <link href="../Assets/img/favicon.png" rel="icon">
    <link href="../Assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../Assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../Assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../Assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../Assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../Assets/css/index.css" rel="stylesheet">


</head>

<body>

    <!-- NAVBAR -->
    <?php include 'Partials/navbar.php'; ?>

    <br><br><br><br>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-5">
                <h2 class="mt-3 text-center"><i class="fa-solid fa-list"></i> Daftar Products</h2>
                <hr>
                <br>
                <!-- <button type="button" class="btn btn-success" onclick="window.location.href = 'tambah.php';">Add Data</button> -->

                <div class="card p-4">
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php foreach ($products as $product) : ?>
                            <div class="col-md-3 mb-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="../Assets/img/product/<?= $product['photo']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text"><?= $product['product_name']; ?></h4>
                                        <b class="card-text">Description:</b>
                                        <p><?= $product['description']; ?></p>
                                        <a href="detail-product.php?id=<?= $product['id_product']; ?>" class="btn btn-primary btn-sm">Details <i class="fa-solid fa-forward"></i>
                                        <a href="" class="ms-3 btn btn-success btn-sm">Buy <i class="fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    

                </div>
            </div>
        </main>
    </div>
    </main>

    </div>






    <script src="../Assets/js/table.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <!-- Vendor JS Files -->
    <script src="../Assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../Assets/vendor/aos/aos.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../Assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../Assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../Assets/js/main.js"></script>
</body>

</html>
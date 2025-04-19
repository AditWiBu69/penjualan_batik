<?php
session_start();
require '../../Server/Config/Read/productRead.php';
$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

$products = query("SELECT product_name,price FROM products WHERE id_product = $id")[0];
$users = query("SELECT name FROM biodata WHERE user_id = $id_user")[0];
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

    <br><br><br>
    <div id="layoutSidenav_content">
        <main>
            <form action="../../Server/Config/Create/checkoutCreate.php" class="row g-3" method="post" enctype="multipart/form-data">
                <div class="container-fluid px-5">
                    <h2 class="mt-3 text-center"><i class="fa-solid fa-bag-shopping"></i> Checkout</h2>
                    <hr>
                    <div class="row w-100 d-flex align-items-center" style="padding-left: 2em;">
                        `
                        <p>Silahkan transfer pada rekening berikut : 922498xxxx a.n Adit</p>

                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input type="hidden" name="id_product" value="<?= $id ?>">

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $users['name']; ?>" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" value="<?= $products['product_name']; ?>" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <?php
                            $price = $products['price'];
                            $formatted_price = number_format($price, 2, ',', '.');
                            ?>
                            <input type="text" name="price" class="form-control" id="price" value="<?="Rp " .  $formatted_price; ?>" disabled>
                            <input type="hidden" id="priceValue" value="<?= $price; ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter quantity">
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" name="total" class="form-control" id="total" value="Rp 0,00" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_rek" class="form-label">Nomor Rekening</label>
                            <input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="No rekening">
                        </div>

                        <div class="col-md-6 mb-3">
                        <label for="size">Pilih Ukuran:</label>
                        <select id="size" name="size">
                        <option value="small">S</option>
                        <option value="medium">M</option>
                        <option value="large">L</option>
                        <option value="extra-large">XL</option>
                        </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="formFile" class="form-label">Bukti Pembayaran</label>
                            <input class="form-control" type="file" id="formFile" name="photo">
                        </div>
                        <div class="">
                            <br>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'product.php';"><i class="fa-solid fa-backward"></i> Back</button>
                            <button type="submit" class="btn btn-success"> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
        </main>
    </div>



    <script>
        document.getElementById('qty').addEventListener('input', function() {
            var price = parseFloat(document.getElementById('priceValue').value);
            var quantity = parseInt(this.value);
            if (!isNaN(quantity) && quantity > 0) {
                var total = price * quantity;
                var formattedTotal = "Rp " + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.').replace('.', ',');
                document.getElementById('total').value = formattedTotal;
            } else {
                document.getElementById('total').value = "Rp 0,00";
            }
        });
    </script>





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
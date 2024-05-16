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
        <h2 class="mt-3 text-center"><i class="fa-solid fa-user"></i> Profile</h2>
        <hr>

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="name" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="mb-3">
          <label for="no_telp" class="form-label">No Telp</label>
          <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="No Telp">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Address</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <hr>
        <button type="button" class="btn btn-success" onclick="window.location.href = '#';"> Submit</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'customer.php';"><i class="fa-solid fa-backward"></i> Back</button>
    </main>
  </div>

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
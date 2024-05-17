<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LandingPage</title>


  <!-- Favicons -->
  <link href="../Client/Assets/img/favicon.png" rel="icon">
  <link href="../Client/Assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Client/Assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Client/Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Client/Assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Client/Assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Client/Assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Client/Assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Client/Assets/css/index.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <!-- NAVBAR -->
  <?php include 'Partials/navbar.php'; ?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Welcome to BatikKu!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Realizing the Charm of Indonesian Culture Through Batik.</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="./Assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->



  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-5">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>About Us</h3>
              <h2>BatikKu.</h2>
              <p class="text-justify">
                BatikKu was founded with the determination to preserve and promote Indonesia's batik heritage. Inspired by the beauty and uniqueness of each batik motif, we strive to present products that are not only beautiful but also have high cultural value.
              </p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="../Client/Assets/img/aboutus.png" width="510" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->


    <section id="contact" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-5">
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="../Client/Assets/img/contact2.png" width="450" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Contact</h3>
              <h2>BatikKu.</h2>
              <p class="text-justify">
                <table>
                  <tr>
                    <td> <i class="fa-solid fa-phone"></i> +62035-0343-1294</td>
                  </tr>
                  <tr>
                    <td> <i class="fa-solid fa-house-chimney"></i> Jl. Sarijadi No.20 Bandung Barat</td>
                  </tr>
                  <tr>
                    <td><i class="fa-brands fa-square-instagram"></i> @batikku.official_</td>
                  </tr>
                  <tr>
                    <td> <i class="fa-brands fa-facebook"></i> BatikKu</td>
                  </tr>
                </table>
              </p>

              <!-- <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div> -->
            </div>
          </div>



        </div>
      </div>

    </section><!-- End About Section -->










  </main><!-- End #main -->

  <!-- FOOTER -->
  <?php include 'Partials/footer.php'; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../Client/Assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../Client/Assets/vendor/aos/aos.js"></script>
  <script src="../Client/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Client/Assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Client/Assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../Client/Assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../Client/Assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../Client/Assets/js/main.js"></script>
</body>

</html>
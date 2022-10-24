<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    if ($password != $username) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Sign In</title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=63c49130f916e8761302328c73ff1917">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/assets/css/styles.min.css?h=e3b581880589b79feb96061763b44c03">
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
  <!-- Start: Navbar Centered Links -->
  <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/index.html"><span
          class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><img
            src="/assets/img/1664268155719.png?h=8d712739119881ce6b0b113c1a533e45" width="114" height="229"
            style="width: 34px;height: 34px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
            fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
            <path fill-rule="evenodd"
              d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z">
            </path>
            <path
              d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z">
            </path>
          </svg></span><span style="font-family: Poppins, sans-serif;color: #49516f;">Pregmom</span></a><button
        data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
          navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav mx-auto"></ul><a class="btn btn-primary shadow" role="button" href="/sign-in.html"
          style="border-radius: 12px;width: 90px;padding-left: 18px;background: #ff2391;border-width: 1px;border-color: #ff2391;font-family: Poppins, sans-serif;">Masuk</a>
      </div>
    </div>
  </nav><!-- End: Navbar Centered Links -->
  <!-- Start: 1 Row 2 Columns -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xxl-6 ol-md-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
        <div style="position: relative;">
          <div>
            <h1 style="font-weight: bold;font-family: Poppins, sans-serif;font-size: 44.44px;color: #49516f;">Hallo,
              Selamat datang Mommy!</h1>
          </div>
          <div>
            <p style="font-size: 26.67px;color: #49516f;width: 580px;">Buat akun dulu ya, agar nanti bisa langsung
              mencoba fitur-fitur kita untuk mendapatkan solusi sehingga siap menghadapi kehamilan.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" style="margin-top: 48px;">
        <div>
          <h1
            style="font-weight: bold;font-family: Poppins, sans-serif;font-size: 35.56px;color: #49516f;text-align: center;">
            Belum Punya Akun?</h1>
          <h1 style="font-family: Poppins, sans-serif;font-size: 35.56px;color: #49516f;text-align: center;">Yuk Buat
            Akun Dulu</h1>
          <div style="text-align: center;"><a href="#"><img
                src="/assets/img/google_logo_png_suite_everything_you_need_know_about_google_newest_0_1.png?h=577d46810703d462b91f33215de43d6b"
                style="margin-right: 10px;"></a><a href="#"><img
                src="/assets/img/pngwing.png?h=fd50dec22bbfa2ed01f137a107424e24" style="margin-left: 10px;"></a>
            <p style="text-align: center;">atau membuat akun menggunakan email :</p>
          </div>
        </div>
        <div class="card mb-5" style="border-width: 0px;">
          <div class="card-body d-flex flex-column align-items-center">
            <form class="text-center" method="post">
              <div class="mb-3">
                <div class="d-flex flex-row align-items-center mb-4"><span
                    class="d-xxl-flex justify-content-xxl-center align-items-xxl-center"
                    style="border-color: rgb(3,95,187);background: #ff2391;border-top-left-radius: 17px;width: 54.4375px;height: 54.4375px;"><svg
                      xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                      class="d-xxl-flex align-items-xxl-center"
                      style="width: 34.44px;height: 34.44px;color: rgb(255,255,255);">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z"
                        fill="currentColor"></path>
                    </svg></span><input class="form-control" type="email" name="email" placeholder="Email"
                    style="border-radius: 0px;height: 54.4375px;width: 312.23px;border-color: rgb(255,35,145);font-family: Poppins, sans-serif;" <?php echo $email; ?>" required>
                </div>
              </div>
              <div class="mb-3">
                <div class="d-flex flex-row align-items-center mb-4"><span
                    class="d-xxl-flex justify-content-xxl-center align-items-xxl-center"
                    style="border-color: rgb(3,95,187);background: #ff2391;border-top-left-radius: 0px;width: 54.4375px;height: 54.4375px;"><svg
                      xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                      viewBox="0 0 16 16"
                      class="bi bi-person d-xxl-flex justify-content-xxl-center align-items-xxl-center"
                      style="width: 34.44px;height: 34.44px;color: rgb(255,255,255);">
                      <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                      </path>
                    </svg></span>
                    <input class="form-control" type="text" name="username"
                    style="height: 54.4375px;border-radius: 0px;border-width: 1px;border-color: #ff2391;border-top-color: rgb(45,;border-right-color: 45,;border-bottom-color: 45);border-left-color: 45,;width: 312.23px;"
                    placeholder="Nama Lengkap" <?php echo $username; ?>" required></div>
              </div>
              <div class="mb-3" style="font-family: Poppins, sans-serif;">
                <div class="d-flex flex-row align-items-center mb-4" style="font-family: Poppins, sans-serif;"><span
                    class="d-xxl-flex justify-content-xxl-center align-items-xxl-center"
                    style="background: #ff2391;font-family: Poppins, sans-serif;width: 54.4375px;height: 54.4375px;"><svg
                      xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                      style="width: 34.44px;height: 34.44px;color: rgb(255,255,255);">
                      <path
                        d="M12 15V17M6 21H18C19.1046 21 20 20.1046 20 19V13C20 11.8954 19.1046 11 18 11H6C4.89543 11 4 11.8954 4 13V19C4 20.1046 4.89543 21 6 21ZM16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11H16Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></span>
                  <input class="form-control" type="password" name="password" placeholder="Password"
                    style="border-color: #ff2391;border-radius: 0px;width: 312.23px;height: 54.4375px;border-bottom-right-radius: 17px;font-family: Poppins, sans-serif;" value="<?php echo $_POST['password']; ?>" required>

                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-block w-100" type="submit" name="submit"
                  style="font-size: 33.33px;border-radius: 55.56px;background: #ff2391;font-weight: bold;font-family: Poppins, sans-serif;border-width: 0px;">DAFTAR</button>
              </div>
              <p class="text-muted" style="font-size: 14px;font-family: Poppins, sans-serif;">Belum Punya Akun? Yuk Buat
                Akun Dulu!</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End: 1 Row 2 Columns -->
  <!-- Start: Footer Multi Column -->
  <footer class="bg-primary-gradient" style="background: #ff2391;">
    <div class="container py-4 py-lg-5">
      <div class="row justify-content-center" style="margin-top: 20px;">
        <!-- Start: Services -->
        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="width: 517px;">
          <h1 style="font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;color: rgb(255,255,255);">Masih
            Ragu dan Memiliki Pertanyaan?</h1>
          <h1 style="font-family: Poppins, sans-serif;font-size: 25.56px;color: rgb(255,255,255);">Hubungi Kami Kapanpun
            :</h1>
          <ul class="list-unstyled">
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/mail.png?h=d916c4a35a849b9ae264268096cdff2f"
                  style="width: 35px;height: 35px;margin-right: 10px;">cs@pregmom.id</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/whatsapp.png?h=0b00d958a774444ce5d38613d48cd9c0"
                  style="width: 35px;height: 35px;margin-right: 10px;">0853 3566 9905</a></li>
          </ul>
        </div><!-- End: Services -->
        <!-- Start: Services -->
        <div class="col-sm-4 col-md-3 col-xxl-3 text-center text-lg-start d-flex flex-column item"
          style="width: 316px;">
          <h1 style="font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;color: rgb(255,255,255);">Ikuti
            Kami</h1>
          <ul class="list-unstyled">
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/facebook.png?h=bea4d18b2f6ff830eb14c4905dd66bee"
                  style="width: 35px;height: 35px;margin-right: 10px;">pregmom.id</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/twitter_squared.png?h=6576c514f4aa75b02739cc4715876f0c"
                  style="width: 35px;height: 35px;margin-right: 10px;">@pregmom.id</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/instagram_logo.png?h=c5fb8efc1e49c8d78edfc2c8ebf3ec1c"
                  style="width: 35px;height: 35px;margin-right: 10px;">@pregmom.id</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/youtube_play_button.png?h=6080b4c6c1d09de8895f9007cb9dbe96"
                  style="width: 35px;height: 35px;margin-right: 10px;">pregmom.id</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;"><img
                  src="/assets/img/linkedin.png?h=95787a1f0175d8732e795ff1fd9631c9"
                  style="width: 35px;height: 35px;margin-right: 10px;">pregmom.id</a></li>
          </ul>
        </div><!-- End: Services -->
        <!-- Start: Services -->
        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="width: 307px;">
          <h1 style="font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;color: rgb(255,255,255);">
            Dukungan</h1>
          <ul class="list-unstyled">
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;">FAQ</a>
            </li>
            <li><a href="#"
                style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;">Kebijakan dan
                Privasi</a></li>
            <li><a href="#" style="font-size: 18.89px;color: rgb(245,245,245);font-family: Poppins, sans-serif;">Syarat
                dan Ketentuan</a></li>
          </ul>
        </div><!-- End: Services -->
      </div>
    </div>
  </footer><!-- End: Footer Multi Column -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/script.min.js?h=2d5c83a0b230af4e0f7b277aff5d5fd7"></script>
</body>

</html>
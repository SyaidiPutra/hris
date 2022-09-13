<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"> -->
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= BASEURL; ?>/assets/img/bfi-logo.png" rel="icon">
    <title>Login</title>

    <style>
        body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }

        .btn-google {
        color: white !important;
        background-color: #ea4335;
        }

        .btn-facebook {
        color: white !important;
        background-color: #3b5998;
        }
    </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
            <form action="<?= BASEURL; ?>/auth/login" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off" autofocus required>
                <label for="username">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>
              </div>
              <?php if(isset($_SESSION['flash'])) : ?>
                  <?php Flasher::flash(); ?>
              <?php endif;?>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?= BASEURL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
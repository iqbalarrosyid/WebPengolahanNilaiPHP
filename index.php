<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Spetaq</title>
  <link rel="stylesheet" href="bs/css/bootstrap.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
  <link rel="icon" type="image/png" href="logo smataq.png" />
</head>

<body>

  <section class="p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="card">
        <div class="card-body shadow">
          <div class="row g-0 full-height">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="https://files.edfal.com/images/1691039398.jpeg" alt="BootstrapBrain Logo">
            </div>
            <div class="col-12 col-md-6">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5">
                      <h3>Log in</h3>
                    </div>
                  </div>
                </div>
                <form method="post" action="cek-login.php">
                  <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                      <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="" required>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="password" id="password" value="" required>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                        <label class="form-check-label text-secondary" for="remember_me">
                          Keep me logged in
                        </label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <input type="submit" class="btn btn-success" value="Login">
                      </div>
                    </div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-12">
                    <hr class="mt-5 mb-4 border-secondary-subtle">
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                      <a href="#!" class="link-secondary text-decoration-none">Create new account</a>
                      <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <script src="bs/js/bootstrap.js"></script>
</body>

</html>
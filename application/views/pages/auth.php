
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5" style="border-radius: 30px;box-shadow: 0 4px 8px 0 rgba(48, 142, 224, 0.2), 0 6px 20px 0 rgba(48, 142, 224, 0.2);">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?php if (isset($_SESSION['message'])) : ?>
                      <div class="alert alert-<?= $_SESSION['message']['style'] ?>"><?= $_SESSION['message']['content'] ?></div>
                      <?php unset($_SESSION['message']); ?>
                  <?php endif; ?>
                  <form class="user">
                  
                    <div class="form-group">
                      <input type="text" name="email" id="email" class="form-control" aria-describedby="emailHelp"
                        placeholder="Email" autocomplete="off" autofocus="">
                    </div>
                    <div class="input-group">
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" id="icon-pass-profile"></i></span>
                      </div>
                    </div>
         
                    <div class="form-group mt-3">
                      <button type="button" id="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">MASUK</button>
                    </div>
                    <!-- <hr> -->
                  </form>
                  <div class="text-center">
                    <a href="<?= base_url('register') ?>">Belum Punya Akun? |</a> <a href="<?= base_url('forgotpassword') ?>">Forgot Password?</a> 
                  </div>
                  <hr>
                  <div class="text-center">
                    <p class="small">
                      JWP Mayang Asura - Coralis Studio
                       <!-- <br> <a class="font-weight-bold " href="https://sabilulkhayr.com">Sabilul Khayr Al Ibana by IT SKAI.</a> -->
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

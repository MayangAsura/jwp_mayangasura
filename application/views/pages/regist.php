

  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
      <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
                  </div>

                  
                  <?php if (isset($session['result']['title']) && $session['result']['title'] == 'FAILED') : ?>
                    <div class="alert alert-warning">
                        <b>Registration Failed!</b>

                        <ul class="mb-0">
                            <?php foreach ($session['result']['message'] as $row) : ?>

                                <li><?= $row['message'] ?></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                  <?php endif;  ?>

                  <form id="form_regist" method="post" action="<?= base_url('auth/regist_user') ?>" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label>Nama</label>
                        <input name="name" id="name" type="text" class="form-control form-control-sm" value="<?= isset($session['data']['name'])? $session['data']['name']:'' ?>" placeholder="Enter Name">
                        
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Email</label>
                        <input name="email" id="email" type="text" class="form-control form-control-sm" value="<?= isset($session['data']['email'])? $session['data']['email']:'' ?>"  aria-describedby="emailHelp"
                          placeholder="Enter Email Address">
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Password</label>
                        <input name="password" id="password" type="password" class="form-control form-control-sm" placeholder="Password">
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Repeat Password</label>
                        <input id="repeat_password" type="password" class="form-control form-control-sm" placeholder="Repeat Password">
                        <small id="messagepassword"></small>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Profile Picture</label>
                        <input name="profile" id="profile" type="file" class="form-control form-control-sm" accept="image/*">
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?= base_url() ?>">Sudah punya akun?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
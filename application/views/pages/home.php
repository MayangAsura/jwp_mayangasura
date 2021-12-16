

<link href="<?= base_url('assets/css/custom.css')?>" rel="stylesheet">
<!-- TopBar --> 

      <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-5 static-top fixed-top">
        <div class="container">
          <!-- <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->
          <a class="navbar-brand text-white" href="#">JWP Coralis Studio</a>
          <ul class="navbar-nav ml-auto">
            
          
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url('assets/uploads/'). $data['profile'] ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $data['name'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

        <!-- Topbar -->
  

  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-12  mt-5">

        <!-- <div class="col-xl-8 col-lg-7"> -->
            <div class="card2 mb-4 justify-content-center">
                <div class="card-header2 d-flex flex-row align-items-center justify-content-center">
                </div>
                <div class="card card-body justify-content-center py-5">
                    <h5 class="m-0 font-weight-bold text-primary text-center mb-3">User Information</h5> 

                    <?php //var_dump($data);die();
                        if($data['profile']):

                            echo '<center><img src="'.base_url('assets/uploads/'). $data['profile'].'" alt="" width="40%" class="img img-fluid align-item-center" ></center>';
                        else :
                            echo '<center><p> No profile photo </p></center>';
                        endif;
                    ?>
                    <div style="overflow-x:auto">

                      
                      <table class="styled-table table">
                        <tbody >
                              
                                <tr>
                                    <td>Nama </td>
                                    <td> : </td>
                                    <td> <?= $data['name'] ?> </td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td> : </td>
                                    <td> <?= $data['email'] ?> </td>
                                </tr>
                                <tr>
                                    <td>Password </td>
                                    <td> : </td>
                                    <td> (no preview) </td>
                                </tr>
                                
                        </tbody>
  
                    
                      </table>
                    </div>
            </div>
            </div>
        <!-- </div> -->
      
      </div>
    </div>
  </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
        </div>
        </div>
    </div>
    </div>
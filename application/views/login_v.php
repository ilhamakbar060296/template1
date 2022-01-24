<!--<?php echo validation_errors(); ?>
<?php echo form_open('Auth/aksi_login')?>-->
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">                
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Area</h1>
                  </div>
                  <?php echo validation_errors(); ?>
                  <?php echo form_open('Auth/aksi_login')?>
                  <form class="user" method="post" >
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <!--<a href="<?= site_url() ?>/welcome" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    <?php echo $this->session->flashdata('notif') ?>
                    <hr>
                    <!--<a href="#" onclick="ftr()" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="#" onclick="ftr()" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <?php echo form_close()?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= site_url() ?>auth/forgotpass">Forgot Password?</a>
                    <p>or</p>
                    <a class="small" href="<?= site_url() ?>auth/register">don't have account yet? Register!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

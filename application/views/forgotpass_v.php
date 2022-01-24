<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-7 col-lg-9 col-md-auto">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5 col-xl-auto">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
              </div>
              <?php echo form_open('Auth/reset')?>
              <form class="user">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                </div>
                <!--<a href="<?= site_url() ?>/auth/index" class="btn btn-primary btn-user btn-block">
                  Reset Password
                </a>-->
                <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                <?php echo $this->session->flashdata('notif') ?>
                <p>
                <center><a class="small" href="<?= site_url('auth'); ?>">Cancel</a></center></p>
              </form>
              <?php echo form_close()?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
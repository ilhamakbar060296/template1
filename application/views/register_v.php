 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <?php echo form_open_multipart('Auth/simpan')?>
              <form class="user">
                <div class="form-group">                  
                  <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="Nama">                                    
                </div>
                <div class="form-group">
                  <label for="text">Jenis Kelamin :</label><br>
                  <input type="radio" name="kelamin" value="Laki-Laki"/>Laki-Laki
                  <input type="radio" name="kelamin" value="Perempuan"/>Perempuan
                </div>
                <div class="form-group">
                  <input type="text" name="tempat" class="form-control form-control-user" id="tempat" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label for="text">Tanggal Lahir :</label><br>
                  <input type="date" name="tanggal" class="form-control form-control-user" id="tanggal" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                  <input type="text" name="agama" class="form-control form-control-user" id="agama" placeholder="Agama">
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" class="form-control form-control-user" id="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <input type="text" name="telp" class="form-control form-control-user" id="telp" placeholder="No HP">
                </div>                
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="pass" class="form-control form-control-user" id="InputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="pass2" class="form-control form-control-user" id="RepeatPassword" placeholder="Ulangi password">
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="text">Upload Foto (MAX 1 MB) :</label><br>
                  <input type="file" name="jpg" id="jpg" required />
                  <?php echo $this->session->flashdata('notif') ?>
                </div> 
                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                <hr>
              </form>
              <?php echo form_close()?>
              <hr> 
              <div class="text-center">
                <a class="small" href="<?= site_url('auth/forgotpass'); ?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= site_url('auth'); ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
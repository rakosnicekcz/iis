<section class="vh-100 gradient-custom">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <?php echo form_open('userAccessController/login'); ?>
              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmail" name="email" class="form-control form-control-lg" value="<?php echo set_value('email'); ?>" required>
                <span class="text-danger"><?php echo form_error('email'); ?></span>
                <label class="form-label" for="typeEmail">Email <b class="text-danger">*</b></label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePassword" name="password" class="form-control form-control-lg" required>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
                <label class="form-label" for="typePassword">Password <b class="text-danger">*</b></label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"></a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
              <p class="text-danger" style="margin-top: 10px"><?php echo $this->session->flashdata('login_error'); ?></p>
              <?php form_close(); ?>
            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href=<?php echo site_url('userAccessController/registration'); ?> class="text-white-50 fw-bold">Sign Up</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
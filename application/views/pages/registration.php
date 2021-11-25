<section class="vh-100 gradient-custom  mt-5">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4">
              <h2 class="fw-bold mb-2 text-uppercase">Registration</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <?php echo form_open('userAccessController/registration'); ?>
              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmail" name="email" class="form-control form-control-lg" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email'); ?>
                <label class="form-label" for="typeEmail">Email</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeName" name="name" class="form-control form-control-lg" value="<?php echo set_value('name'); ?>">
                <?php echo form_error('name'); ?>
                <label class="form-label" for="typeName">Name</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typeSurename" name="surename" class="form-control form-control-lg" value="<?php echo set_value('surename'); ?>">
                <?php echo form_error('surename'); ?>
                <label class="form-label" for="typeSurename">Surename</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="typePassword" name="password" class="form-control form-control-lg">
                <?php echo form_error('password'); ?>
                <label class="form-label" for="typePassword">Password</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordAgain" name="passwordAgain" class="form-control form-control-lg">
                <?php echo form_error('passwordAgain'); ?>
                <label class="form-label" for="typePasswordAgain">Password again</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Sign Up</button>
              <?php echo $this->session->flashdata('registration_error'); ?>
              <?php form_close(); ?>
            </div>

            <div>
              <p class="mb-0">Already have an account? <a href=<?php echo site_url('UserAccessController/login'); ?> class="text-white-50 fw-bold">Login</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
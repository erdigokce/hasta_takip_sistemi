<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-6" style="margin-top: 100px;">
      <!--Form with header-->
      <div class="card">
          <div class="card-block">

              <!--Header-->
              <div class="form-header purple darken-4">
                  <h3><i class="fa fa-lock"></i> Login:</h3>
              </div>
              <?php echo form_open('login', array('class' => 'form', 'name' => 'loginForm')); ?>
              <!--Body-->
              <div class="md-form">
                  <i class="fa fa-envelope prefix"></i>
                  <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo get($login_username); ?>">
    				      <label for="username"></label>
              </div>

              <div class="md-form">
                  <i class="fa fa-lock prefix"></i>
                  <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get($login_password); ?>">
    				      <label for="password"></label>
              </div>

              <div class="text-center">
        				<button class="btn btn-deep-purple" id="resetLoginForm"><?php echo get($login_reset); ?></button>
        				<button class="btn btn-deep-purple" id="submitLoginForm"><?php echo get($login_submit); ?></button>
              </div>

          </div>

          <!--Footer-->
          <div class="modal-footer">
              <div class="options">
                  <p><?php echo anchor('#', get($login_lost_password)); ?></p>
              </div>
          </div>

          <div class="row">
            <br>
            <div class="col-sm-offset-4 col-sm-4 text-center">
                <?php
                echo validation_errors();
                if (get($is_user_online) === TRUE) {
                  echo '<div class="alert alert-danger">'.get($err_user_online).' </div>';
                }
                elseif(isset($auth_fail) && $auth_fail === TRUE) {
                  echo '<div class="alert alert-danger">'.get($err_auth_fail).' </div>';
                }
                if (isset($status) && $status === 'session_expire') {
                  echo '<div class="alert alert-warning">'.get($err_session_expire).' </div>';
                }
                ?>
            </div>
            <div class="col-sm-4"></div>
          </div>
      </div>
      <!--/Form with header-->
    </div>
  </div>
</div>

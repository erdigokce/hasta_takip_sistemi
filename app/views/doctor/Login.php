<div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4" style="margin-top: 100px;">
      <!--Form-->
      <?php echo form_open('login', array('class' => 'form', 'name' => 'loginForm')); ?>
      <!--Body-->
      <!--Username or Email-->
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo get($login_username); ?>">
      </div>
      <!--Password-->
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get($login_password); ?>">
      </div>

    </div>
  </div>
  <!--Buttons-->
  <div class="row" style="margin-bottom:5px;">
    <div class="col-md-offset-4 col-md-4">
  		<input type="reset" class="btn btn-default" id="resetLoginForm" style="float:right; margin-left:5px;" value="<?php echo get($login_reset); ?>">
  		<input type="submit" class="btn btn-primary" id="submitLoginForm" style="float:right" value="<?php echo get($login_submit); ?>">
    </div>
    <div class="col-md-offset-4"></div>
  </div>
  <!--Footer-->
  <div class="row">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="modal-footer">
          <div class="options">
              <a href="#"> <?php echo get($login_lost_password); ?></a>
          </div>
      </div>
    </div>
    <div class="col-sm-offset-4"></div>
  </div>
  <!--Error boxes-->
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
  </div>
  <div class="col-sm-4"></div>
</div>

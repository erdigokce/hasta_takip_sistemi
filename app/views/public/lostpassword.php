<div class="container">
<?php if (!isSetAndNotEmpty(get($lp_description)) && !isSetAndNotEmpty(get($reset_key))) : // Lost password initial ?>
  <!--Form-->
<?php echo form_open($page_controller.'/resetPasswordRequest',
                     array('class' => 'form-horizontal',
                     'name' => 'formLostPasswordRenewalEmail')); ?>
<div class="form-group">
  <label class="control-label col-sm-2 col-sm-offset-2" for="saveMail">
    <?php echo get($lp_user_email); ?>
  </label>
  <div class="col-sm-4">
    <input type="email" name="saveMail" class="form-control" id="saveMail">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2 col-sm-offset-2" for="saveMailValidate">
    <?php echo get($lp_user_email_validate); ?>
  </label>
  <div class="col-sm-4">
    <input type="email" name="saveMailValidate" class="form-control" id="saveMailValidate">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-4 col-sm-4">
    <input class="btn btn-success"
           type="submit"
           name="submitSaveMail"
           value="<?php echo get($lp_user_email_send); ?>"
           style="float:right;">
  </div>
</div>
</form>
<?php elseif (isSetAndNotEmpty(get($lp_description))) : // Renewal request has been sent for validation?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 alert alert-info">
      <p class="form-control-static" id="formLostPasswordRenewalEmailDescription">
        <?php echo sprintf(get($lp_description), "<strong>".get($email)."</strong>"); ?>
      </p>
    </div>
  </div>
<?php elseif (isSetAndNotEmpty($reset_key) && isSetAndNotEmpty($username)) : // Validated and recreation new password.?>
  <?php if($reset_key == hash('sha512', HTS_504_BIT_WPA_KEY.$email)): ?>
    <!--Form-->
  <?php echo form_open($page_controller.'/changePassword/'.$reset_key.'/'.$username,
                       array('class' => 'form-horizontal',
                       'name' => 'formLostPasswordChangePassword')); ?>
  <div class="form-group">
    <label class="control-label col-sm-2 col-sm-offset-2" for="newPassword">
      <?php echo get($lp_new_password); ?>
    </label>
    <div class="col-sm-4">
      <input type="password" name="newPassword" class="form-control" id="newPassword">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 col-sm-offset-2" for="newPasswordValidate">
      <?php echo get($lp_new_password_retry); ?>
    </label>
    <div class="col-sm-4">
      <input type="password" name="newPasswordValidate" class="form-control" id="newPasswordValidate">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-4">
      <input class="btn btn-success"
             type="submit"
             name="submitNewPassword"
             value="<?php echo get($lp_new_password_send); ?>"
             style="float:right;">
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>
</div>

<!--Error boxes-->
<div class="row">
  <br>
  <div class="col-sm-offset-4 col-sm-4 text-center">
      <?php
      echo validation_errors();
      ?>
  </div>
</div>

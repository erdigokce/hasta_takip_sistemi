<div class="container" style="padding: 100px 0px;">
  <div class="row">
    <div class="col-lg-offset-3 col-lg-6">
      <form class="form" name="loginForm" method="post">
        <div class="input-group col-sm-offset-3 col-sm-6">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control" type="text" name="username" placeholder="Kullanıcı Adı" required="required">
        </div>
        <br>
        <div class="input-group col-sm-offset-3 col-sm-6">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input class="form-control" type="password" name="password" placeholder="Şifre" required="required">
        </div>
        <br>
        <div class="form-group row">
          <div class="col-lg-offset-3 col-lg-3"><input class="form-control btn btn-default" type="reset" name="resetLoginForm" value="Temizle"></div>
          <div class="col-lg-3"><input class="form-control btn btn-primary" type="submit" name="submitLoginForm" value="Giriş"></div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-offset-4 col-sm-4 text-center">
      <?php echo anchor('#','Şifremi Unuttum'); ?>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

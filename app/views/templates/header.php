<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" onclick="location.href='<?php echo base_url();?>'"> Hasta Takip Sistemi </a>
    </div>
    <?php if(isset($authorized) && $authorized != TRUE): ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" onclick="location.href='<?php echo base_url()."login";?>'"><span class="glyphicon glyphicon-log-in"></span> Giriş </a></li>
    </ul>
    <?php else: ?>
    <ul class="nav navbar-nav navbar-right">
      <li><p class="navbar-text"><?php echo $name." ".$surname; ?></p></li>
      <li><a href="#" onclick="location.href='<?php echo base_url()."login";?>'"> Çıkış <span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
    <?php endif; ?>
  </div>
</nav>

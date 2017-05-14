<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" onclick="location.href='<?php echo base_url();?>'"> Hasta Takip Sistemi </a>
      </div>
      <div class="collapse navbar-collapse" id="topNavbar">
        <?php if(isset($auth) && $auth === FALSE): ?>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" onclick="location.href='<?php echo base_url()."login";?>'"><span class="glyphicon glyphicon-log-in"></span> <?php echo get($nav_pro_login); ?> </a></li>
        </ul>
        <?php else: ?>
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text"><?php echo get($name)." ".get($surname); ?></p></li>
          <li><a href="#" onclick="location.href='<?php echo base_url()."dashboard";?>'"><?php echo get($nav_pro_dashboard); ?></a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo get($nav_pro); ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><?php echo get($nav_pro_inbox); ?></a></li>
              <li><a href="#"><?php echo get($nav_pro_settings); ?></a></li>
            </ul>
          </li>
          <li><a href="#" onclick="location.href='<?php echo base_url()."login/logout/";?>'"> <?php echo get($nav_pro_logout); ?> <span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
        <?php endif; ?>
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo get($nav_lang); ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#" onclick="location.href='<?php echo base_url()."navbar/lang/turkish/".get($page_controller)."/";?>'">
                  <?php echo get($nav_lang_tr); ?>
                  <img src="<?php echo getNationalFlag('tr')[0] ?>" style="float:right; width: <?php echo getNationalFlag('tr')[1] ?>; height: <?php echo getNationalFlag('tr')[2] ?>;" alt="<?php echo getNationalFlag('tr')[3] ?>">
                </a>
              </li>
              <li>
                <a href="#" onclick="location.href='<?php echo base_url()."navbar/lang/english/".get($page_controller)."/";?>'">
                  <?php echo get($nav_lang_en); ?>
                  <img src="<?php echo getNationalFlag('en')[0] ?>" style="float:right; width: <?php echo getNationalFlag('en')[1] ?>; height: <?php echo getNationalFlag('en')[2] ?>;" alt="<?php echo getNationalFlag('en')[3] ?>">
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

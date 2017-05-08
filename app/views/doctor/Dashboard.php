<div class="row">
  <div class="col-lg-2">
    <nav class="navbar navbar-default">
      <div class="container-fluid" style="height: 1px;padding-left: 0px;padding-right: 0px;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="sideNavbar" style="height: 1px;padding-left: 0px;padding-right: 0px;">
          <?php if ($user_category === "DOCTOR") :?>
          <ul id="menu_left" class="nav nav-pills nav-stacked">
            <li><?php echo anchor('#', $menu_left_item_1, 'class="list-group-item" data-nav="board"'); ?></li>
            <li><?php echo anchor('#', $menu_left_item_2, 'class="list-group-item" data-nav="deviceInformations"'); ?></li>
            <li><?php echo anchor('#', $menu_left_item_3, 'class="list-group-item" data-nav="patientInformations"'); ?></li>
            <li><?php echo anchor('#', $menu_left_item_5, 'class="list-group-item" data-nav="patientLogSchedules"'); ?></li>
            <li><?php echo anchor('#', $menu_left_item_6, 'class="list-group-item" data-nav="streams"'); ?></li>
            <li><?php echo anchor('#', $menu_left_item_4, 'class="list-group-item" data-nav="patientLogs"'); ?></li>
          </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-lg-10">
    <div id="content" class="container-fluid">

    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <div class="alert alert-danger alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_danger"></span>
    </div>
    <div class="alert alert-warning alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_warning"></span>
    </div>
    <div class="alert alert-info alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_info"></span>
    </div>
    <div class="alert alert-success alert-dismissable fade in" style="display:none">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="alert_box_success"></span>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>

<?php if ($user_category === "TEST") : ?>
<div class="alert alert-warning">
  <p class="text-center"><?php echo "(".$username." - ".$name." ".$surname." / ".$user_category.") ".$dashboard_unauthorized_user; ?></p>
</div>
<?php endif; ?>

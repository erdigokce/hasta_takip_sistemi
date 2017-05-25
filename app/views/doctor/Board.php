<!-- First Row -->
<div class="row">

  <div class="col-md-4 panel-dashboard">
    <div class="panel panel-info" style="overflow-y:visible;">
      <div class="panel-heading"><?php echo get($board_last_users); ?></div>
      <div class="panel-body table-responsive">
        <table class="table table-hover .table-condensed" style="font-size:12px;">
          <thead>
            <tr>
              <th><?php echo get($board_last_active_userfullname); ?></th>
              <th><?php echo get($board_user_last_login_date); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($resultLastActiveUsers as $lastActiveUser) : ?>
              <tr>
                <td><?php echo $lastActiveUser->NAME." ".$lastActiveUser->SURNAME; ?></td>
                <td><?php echo (new DateTime($lastActiveUser->DATE_LAST_LOGIN))->format('d M Y, G:i'); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-4 panel-dashboard">
    <div class="panel panel-info">
      <div class="panel-heading"><?php echo get($board_last_added_devices); ?></div>
      <div class="panel-body">

      </div>
    </div>
  </div>

  <div class="col-md-4 panel-dashboard">
    <div class="panel panel-info">
      <div class="panel-heading"><?php echo get($board_last_added_patients); ?></div>
      <div class="panel-body">

      </div>
    </div>
  </div>

</div>

<br>
<!-- Second Row -->
<div class="row">

  <div class="col-md-6 panel-dashboard">
    <div class="panel panel-info">
      <div class="panel-heading"><?php echo get($board_last_reviewed_patients); ?></div>
      <div class="panel-body">

      </div>
    </div>
  </div>

  <div class="col-md-6 panel-dashboard">
    <div class="panel panel-info">
      <div class="panel-heading"><?php echo get($board_upcoming_streams); ?></div>
      <div class="panel-body">

      </div>
    </div>
  </div>

</div>

<br>

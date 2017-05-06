<table class="table table-hover">
	<thead>
		<tr>
      <th>#</th>
			<th><?php echo get($schedule_device_socket); ?></th>
			<th><?php echo get($schedule_pattern); ?></th>
			<th><?php echo get($schedule_type); ?></th>
			<th><?php echo get($schedule_duration); ?></th>
			<th><?php echo get($schedule_description); ?></th>
		</tr>
	</thead>
  <tbody>
		<?php $offset = ($page_number - 1) * $records_per_page; ?>
		<?php $limit = $offset + $records_per_page; ?>
		<?php $i = 0; ?>
		<?php foreach($result as $row) { ?>
		<?php if ($i >= $offset && $i < $limit) { ?>
    <tr id="<?php echo get($row->ID); ?>">
      <td ><?php echo get($row->ID); ?></td>
      <td class="sch_device_socket" data-schdevicesocket="<?php echo get($row->DEVICE_HOST).":".get($row->DEVICE_PORT); ?>">
				<span class="txtDevice"><?php echo get($row->DEVICE_HOST).":".get($row->DEVICE_PORT); ?></span>
				<select class="form-control" name="device" style="display:none;">
					<?php foreach($result_devices as $device) { ?>
					<option value="<?php echo get($device->ID); ?>" <?php if($device->ID === $row->DEVICE_ID) echo "selected=\"selected\""; ?>><?php echo get($row->DEVICE_HOST).":".get($row->DEVICE_PORT)." [".get($row->DEVICE_NAME)."]"; ?></option>
					<?php } ?>
				</select>
			</td>
			<td class="sch_pattern" data-schpattern="<?php echo get($row->SCHEDULE_PATTERN); ?>"><?php echo get($row->SCHEDULE_PATTERN); ?></td>
      <td class="sch_type" data-schtype="<?php echo get($row->SCHEDULE_TYPE); ?>"><?php echo get($row->SCHEDULE_TYPE); ?></td>
      <td class="sch_duration" data-schduration="<?php echo get($row->DURATION); ?>"><?php echo get($row->DURATION); ?></td>
      <td class="sch_description" data-schdescription="<?php echo get($row->DESCRIPTION); ?>" style="max-width: 200px;"><?php echo get($row->DESCRIPTION); ?></td>
      <td><button class="btn btn-sm btn-default" type="button" name="btnEditSchedule"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeleteSchedule"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkSchedule"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelSchedule"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
      <?php $i = $i + 1; ?>
      <?php } ?>
    <?php } ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddSchedule"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="sch_device_socket" data-schdevicesocket="">
				<span class="txtDevice"></span>
				<select class="form-control" name="device" style="display:none;">
					<?php foreach($result_devices as $device) { ?>
					<option value="<?php echo get($device->ID); ?>"><?php echo get($device->DEVICE_HOST).":".get($device->DEVICE_PORT)." [".get($device->DEVICE_NAME)."]"; ?></option>
					<?php } ?>
				</select>
      </td>
      <td class="sch_pattern" data-schpattern=""></td>
      <td class="sch_type" data-schtype=""></td>
      <td class="sch_duration" data-schduration=""></td>
      <td class="sch_description" data-schdescription=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditSchedule"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeleteSchedule"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkSchedule"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelSchedule"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="app/js/hts_log_schedules.js" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil($num_rows / $records_per_page);
  $this->view('templates/pagination.php', $data);

?>

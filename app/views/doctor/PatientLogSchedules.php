
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
      <td class="sch_device_socket" data-schDeviceSocket="<?php echo get($row->DEVICE_HOST).":".get($row->DEVICE_PORT); ?>"><?php echo get($row->DEVICE_HOST).":".get($row->DEVICE_PORT); ?></td>
      <td class="sch_pattern" data-schPattern="<?php echo get($row->SCHEDULE_PATTERN); ?>"><?php echo get($row->SCHEDULE_PATTERN); ?></td>
      <td class="sch_type" data-schType="<?php echo get($row->SCHEDULE_TYPE); ?>"><?php echo get($row->SCHEDULE_TYPE); ?></td>
      <td class="sch_duration" data-schDuration="<?php echo get($row->DURATION); ?>"><?php echo get($row->DURATION); ?></td>
      <td class="sch_description" data-schDescription="<?php echo get($row->DESCRIPTION); ?>"><?php echo get($row->DESCRIPTION); ?></td>
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
      <td class="sch_name" data-schDeviceSocket=""></td>
      <td class="sch_surname" data-schPattern=""></td>
      <td class="sch_address" data-schType=""></td>
      <td class="sch_phone1" data-schDuration=""></td>
      <td class="sch_phone2" data-schDescription=""></td>
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

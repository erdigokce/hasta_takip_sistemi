<table class="table table-hover">
	<thead>
		<tr>
      <th>#</th>
			<th><?php echo get($stream_patient); ?></th>
			<th><?php echo get($stream_token); ?></th>
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
      <td class="st_patient" data-stpatient="<?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?>">
				<span class="txtPatient"><?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?></span>
				<select class="form-control" name="patient" style="display:none;">
					<?php foreach($result_patients as $patient) { ?>
					<option value="<?php echo get($patient->ID); ?>" <?php if($patient->ID === $row->PATIENT_ID) echo "selected=\"selected\""; ?>><?php echo get($patient->PATIENT_NAME)." ".get($patient->PATIENT_SURNAME); ?></option>
					<?php } ?>
				</select>
			</td>
      <td class="st_token" data-sttoken="<?php echo get($row->TOKEN); ?>"><?php echo get($row->TOKEN); ?></td>
      <td><button class="btn btn-sm btn-default" type="button" name="btnEditStream"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeleteStream"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkStream"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelStream"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
      <?php } ?>
			<?php $i = $i + 1; ?>
    <?php } ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddStream"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="st_patient" data-stpatient="">
				<span class="txtPatient"></span>
				<select class="form-control" name="patient" style="display:none;">
					<?php foreach($result_patients as $patient) { ?>
					<option value="<?php echo get($patient->ID); ?>"><?php echo get($patient->PATIENT_NAME)." ".get($patient->PATIENT_SURNAME); ?></option>
					<?php } ?>
				</select>
      </td>
      <td class="st_token" data-sttoken=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditStream"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeleteStream"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkStream"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelStream"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="app/js/hts_streams.js" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil(count($result) / $records_per_page);
  $this->view('templates/pagination.php', $data);
?>

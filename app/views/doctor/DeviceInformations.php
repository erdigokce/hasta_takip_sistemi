<table class="table table-hover">
	<thead>
		<tr>
      <th>#</th>
			<th><?php echo get($device_infos_patient); ?></th>
			<th><?php echo get($device_infos_device_name); ?></th>
			<th><?php echo get($device_infos_device_desc); ?></th>
			<th><?php echo get($device_infos_device_mac); ?></th>
			<th><?php echo get($device_infos_device_host); ?></th>
			<th><?php echo get($device_infos_device_port); ?></th>
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
	      <td class="di_patient" data-dipatient="<?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?>">
					<span class="txtPatient"><?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?></span>
	        <select class="form-control" name="patient" style="display:none;">
						<?php foreach($result_patients as $patient) { ?>
	          <option value="<?php echo get($patient->ID); ?>" <?php if($patient->ID === $row->PATIENT_ID) echo "selected=\"selected\""; ?>><?php echo get($patient->PATIENT_NAME)." ".get($patient->PATIENT_SURNAME); ?></option>
	          <?php } ?>
	        </select>
				</td>
	      <td class="di_name" data-diname="<?php echo get($row->DEVICE_NAME); ?>"><?php echo get($row->DEVICE_NAME); ?></td>
	      <td class="di_desc" data-didesc="<?php echo get($row->DEVICE_DESCRIPTION); ?>"><?php echo get($row->DEVICE_DESCRIPTION); ?></td>
	      <td class="di_mac" data-dimac="<?php echo get($row->DEVICE_MAC); ?>"><?php echo get($row->DEVICE_MAC); ?></td>
	      <td class="di_host" data-dihost="<?php echo get($row->DEVICE_HOST); ?>"><?php echo get($row->DEVICE_HOST); ?></td>
	      <td class="di_port" data-diport="<?php echo get($row->DEVICE_PORT); ?>"><?php echo get($row->DEVICE_PORT); ?></td>
	      <td><button class="btn btn-sm btn-default" type="button" name="btnEditDevice"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
	      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeleteDevice"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
	      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkDevice"> <span class='glyphicon glyphicon-ok'></span> </button></td>
	      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelDevice"> <span class='glyphicon glyphicon-remove'></span> </button></td>
	    </tr>
    	<?php } //if ?>
    	<?php $i = $i + 1; ?>
    <?php } //foreach ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddDevice"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="di_patient" data-dipatient="">
				<span class="txtPatient"></span>
        <select class="form-control" name="patient" style="display:none;">
          <?php foreach($result_patients as $patient) { ?>
          	<option value="<?php echo get($patient->ID); ?>"><?php echo get($patient->PATIENT_NAME)." ".get($patient->PATIENT_SURNAME); ?></option>
          <?php } ?>
        </select>
      </td>
      <td class="di_name" data-diname=""></td>
      <td class="di_desc" data-didesc=""></td>
      <td class="di_mac" data-dimac=""></td>
      <td class="di_host" data-dihost=""></td>
      <td class="di_port" data-diport=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditDevice"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeleteDevice"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkDevice"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelDevice"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="<?php echo base_url()."app/js/hts_device_informations.js"?>" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil(count($result) / $records_per_page);
  $this->view('templates/pagination.php', $data);
?>

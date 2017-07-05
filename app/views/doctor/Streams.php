<?php echo form_open($page_controller.'/streams',
                     array('class' => 'form-horizontal',
                     'name' => 'formStreamInquire',
									 	 'id' => 'formStreamInquire')); ?>
  <div class="row">
      <div class="form-group col-sm-8">
  		<label class="control-label col-sm-3" for="inquireStream">
  			<?php echo get($stream_inquire); ?>
  		</label>
      <div class="col-sm-9">
    		<input type="text"
    					 name="inquireStream"
    					 class="form-control"
    					 id="inquireStream"
    					 placeholder="<?php echo get($stream_inquire_placeholder); ?>">
  	  </div>
  	</div>
  	<div class="form-group col-sm-4">
      <input class="btn btn-success"
             type="submit"
             name="submitInquireStream"
             value="<?php echo get($stream_inquire_button); ?>">
  	</div>
  </div>
</form>
<hr>
<table class="table table-hover">
	<thead>
		<tr>
      <th>#</th>
			<th><?php echo get($stream_patient); ?></th>
			<th><?php echo get($stream_name); ?></th>
			<th><?php echo get($stream_token); ?></th>
			<th><?php echo get($stream_sharekey); ?></th>
			<th><?php echo get($stream_filenumber); ?></th>
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
      <td class="st_name" data-stname="<?php echo get($row->STREAM_NAME); ?>"><?php echo get($row->STREAM_NAME); ?></td>
      <td class="st_token" data-sttoken="<?php echo get($row->TOKEN); ?>"><?php echo get($row->TOKEN); ?></td>
      <td class="st_sharekey" data-stsharekey="<?php echo get($row->SHARE_KEY); ?>"><?php echo get($row->SHARE_KEY); ?></td>
      <td class="st_fi̇lenumber" data-stfilenumber="<?php echo get($row->FILE_NUMBER); ?>"><?php echo get($row->FILE_NUMBER); ?></td>
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
      <td class="st_name" data-stname=""></td>
      <td class="st_token" data-sttoken=""></td>
      <td class="st_sharekey" data-stsharekey=""></td>
      <td class="st_fi̇lenumber" data-stfilenumber=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditStream"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeleteStream"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkStream"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelStream"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="<?php echo base_url()."app/js/hts_streams.js"?>" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil(count($result) / $records_per_page);
  $this->view('templates/pagination.php', $data);
?>

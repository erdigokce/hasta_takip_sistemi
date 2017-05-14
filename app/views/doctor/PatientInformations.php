
<table class="table table-hover">
	<thead>
		<tr>
      <th>#</th>
			<th><?php echo get($patient_infos_name); ?></th>
			<th><?php echo get($patient_infos_surname); ?></th>
			<th><?php echo get($patient_infos_address); ?></th>
			<th><?php echo get($patient_infos_phone1); ?></th>
			<th><?php echo get($patient_infos_phone2); ?></th>
			<th><?php echo get($patient_infos_email); ?></th>
			<th><?php echo get($patient_infos_username); ?></th>
			<th><?php echo get($patient_infos_apikey); ?></th>
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
      <td class="pi_name" data-piname="<?php echo get($row->PATIENT_NAME);?>">
				<?php echo get($row->PATIENT_NAME); ?>
			</td>
      <td class="pi_surname" data-pisurname="<?php echo get($row->PATIENT_SURNAME); ?>">
				<?php echo get($row->PATIENT_SURNAME); ?>
			</td>
      <td class="pi_address" data-piaddress="<?php echo get($row->PATIENT_ADDRESS); ?>">
				<?php echo get($row->PATIENT_ADDRESS); ?>
			</td>
      <td class="pi_phone1" data-piphone1='<?php echo get($row->PATIENT_PHONE); ?>'>
				<a href="tel:<?php echo get($row->PATIENT_PHONE); ?>"><?php echo get($row->PATIENT_PHONE); ?></a>
			</td>
      <td class="pi_phone2" data-piphone2='<?php echo get($row->PATIENT_PHONE2); ?>'>
				<a href="tel:<?php echo get($row->PATIENT_PHONE2); ?>"><?php echo get($row->PATIENT_PHONE2); ?></a>
			</td>
      <td class="pi_email" data-piemail='<?php echo get($row->PATIENT_EMAIL); ?>'>
				<a href="mailto:<?php echo get($row->PATIENT_EMAIL); ?>"><?php echo get($row->PATIENT_EMAIL); ?></a>
			</td>
      <td class="pi_username" data-piusername="<?php echo get($row->PATIENT_USERNAME); ?>">
				<?php echo get($row->PATIENT_USERNAME); ?>
			</td>
      <td class="pi_apikey" data-piapikey="<?php echo get($row->PATIENT_APIKEY); ?>">
				<?php echo get($row->PATIENT_APIKEY); ?>
			</td>
      <td><button class="btn btn-sm btn-default" type="button" name="btnEditPatient"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeletePatient"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkPatient"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelPatient"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
      <?php } //if ?>
			<?php $i = $i + 1; ?>
    <?php } //foreach ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddPatient"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="pi_name" data-piname=""></td>
      <td class="pi_surname" data-pisurname=""></td>
      <td class="pi_address" data-piaddress=""></td>
      <td class="pi_phone1" data-piphone1=""></td>
      <td class="pi_phone2" data-piphone2=""></td>
      <td class="pi_email" data-piemail=""></td>
      <td class="pi_username" data-piusername=""></td>
      <td class="pi_apikey" data-piapikey=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditPatient"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeletePatient"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkPatient"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelPatient"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="app/js/hts_patient_informations.js" charset="utf-8"></script>
<?php
  $data['page_count'] = ceil(count($result) / $records_per_page);
  $this->view('templates/pagination.php', $data);
?>

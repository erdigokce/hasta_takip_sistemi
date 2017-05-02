
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
			<th><?php echo get($patient_infos_apikey); ?></th>
		</tr>
	</thead>
  <tbody>
    <?php $i = ($page_number - 1) * $records_per_page;
          $query->data_seek($i); ?>
    <?php foreach($result as $row) { ?>
      <?php if($i < ($page_number * $records_per_page)){ ?>
    <tr id="<?php echo get($row->ID); ?>">
      <td ><?php echo get($row->ID); ?></td>
      <td class="pi_name" data-piName="<?php echo get($row->PATIENT_NAME);?>"><?php echo get($row->PATIENT_NAME); ?></td>
      <td class="pi_surname" data-piSurname="<?php echo get($row->PATIENT_SURNAME); ?>"><?php echo get($row->PATIENT_SURNAME); ?></td>
      <td class="pi_address" data-piAddress="<?php echo get($row->PATIENT_ADDRESS); ?>"><?php echo get($row->PATIENT_ADDRESS); ?></td>
      <td class="pi_phone1" data-piPhone1="<?php echo get($row->PATIENT_PHONE); ?>"><?php echo get($row->PATIENT_PHONE); ?></td>
      <td class="pi_phone2" data-piPhone2="<?php echo get($row->PATIENT_PHONE2); ?>"><?php echo get($row->PATIENT_PHONE2); ?></td>
      <td class="pi_email" data-piEmail="<?php echo get($row->PATIENT_EMAIL); ?>"><?php echo get($row->PATIENT_EMAIL); ?></td>
      <td class="pi_apikey" data-piApikey="<?php echo get($row->API_KEY); ?>"><?php echo get($row->API_KEY); ?></td>
      <td><button class="btn btn-sm btn-default" type="button" name="btnEditPatient"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeletePatient"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkPatient"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelPatient"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
      <?php $i = $i + 1; ?>
      <?php } ?>
    <?php } ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddPatient"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="pi_name" data-piName=""></td>
      <td class="pi_surname" data-piSurname=""></td>
      <td class="pi_address" data-piAddress=""></td>
      <td class="pi_phone1" data-piPhone1=""></td>
      <td class="pi_phone2" data-piPhone2=""></td>
      <td class="pi_email" data-piEmail=""></td>
      <td class="pi_apikey" data-piApikey=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditPatient"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeletePatient"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkPatient"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelPatient"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<?php
  $data['page_count'] = ceil($num_rows / $records_per_page);
  $this->view('templates/pagination.php', $data);

?>

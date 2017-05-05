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
    <?php $i = ($page_number - 1) * $records_per_page;
          $query->data_seek($i); ?>
    <?php foreach($result as $row) { ?>
      <?php if($i < ($page_number * $records_per_page)){ ?>
    <tr id="<?php echo get($row->ID); ?>">
      <td ><?php echo get($row->ID); ?></td>
      <td class="di_patient" data-dipatient="<?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?>"><?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?></td>
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
      <?php $i = $i + 1; ?>
      <?php } ?>
    <?php } ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddDevice"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="di_patient" data-dipatient=""></td>
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

<script src="app/js/hts_device_informations.js" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil($num_rows / $records_per_page);
  $this->view('templates/pagination.php', $data);

?>

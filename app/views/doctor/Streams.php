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
      <td class="st_patient" data-stPatient="<?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?>"><?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?></td>
      <td class="st_token" data-stToken="<?php echo get($row->TOKEN); ?>"><?php echo get($row->TOKEN); ?></td>
      <td><button class="btn btn-sm btn-default" type="button" name="btnEditStream"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger" type="button" name="btnDeleteStream"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkStream"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelStream"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
      <?php $i = $i + 1; ?>
      <?php } ?>
    <?php } ?>
    <tr id="temp">
      <td><button class="btn btn-sm btn-primary" type="button" name="btnAddStream"> <span class='glyphicon glyphicon-plus-sign'></span> </button></td>
      <td class="st_patient" data-stPatient=""></td>
      <td class="st_token" data-stToken=""></td>
      <td><button class="btn btn-sm btn-default disabled" type="button" name="btnEditStream"> <span class='glyphicon glyphicon-pencil'></span> </button></td>
      <td><button class="btn btn-sm btn-danger disabled" type="button" name="btnDeleteStream"> <span class='glyphicon glyphicon-minus-sign'></span> </button></td>
      <td><button class="btn btn-sm btn-success disabled" type="button" name="btnOkStream"> <span class='glyphicon glyphicon-ok'></span> </button></td>
      <td><button class="btn btn-sm btn-warning disabled" type="button" name="btnCancelStream"> <span class='glyphicon glyphicon-remove'></span> </button></td>
    </tr>
  </tbody>
</table>

<script src="app/js/hts_streams.js" charset="utf-8"></script>

<?php
  $data['page_count'] = ceil($num_rows / $records_per_page);
  $this->view('templates/pagination.php', $data);

?>

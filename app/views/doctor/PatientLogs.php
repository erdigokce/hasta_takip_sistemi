<div class="row">
  <div class="col-md-offset-3 col-md-6">
    <select class="form-control" name="patient">
        <option value=""><?php echo get($patient_logs_select_patient); ?></option>
      <?php foreach ($resultPatients as $row): ?>
        <option value="<?php echo get($row->ID); ?>" <?php if (get($row->ID) == get($patient_id)) echo 'selected="selected"'; ?>><?php echo get($row->PATIENT_NAME)." ".get($row->PATIENT_SURNAME); ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (!isNullOrEmpty(get($patient_selected)) && get($patient_selected) === TRUE && !isNullOrEmpty($resultStreams)): ?>
    <select class="form-control" name="stream">
      <?php foreach ($resultStreams as $row): ?>
          <option value="<?php echo get($row->ID); ?>" data-patientid="<?php echo get($row->PATIENT_ID); ?>"><?php echo get($row->STREAM_NAME); ?></option>
      <?php endforeach; ?>
    </select>
    <?php endif; ?>
  </div>
</div>

<div>

  <ul id="plotly_nav" class="nav nav-tabs">
    <li class="active" data-target="#plotly_container"><a href="#"><?php echo get($patient_logs_last_activity)."/".get($patient_logs_live); ?></a></li>
    <li data-target="#archive_container"><a href="#"><?php echo get($patient_logs_history); ?></a></li>
  </ul>
  <?php if (!isNullOrEmpty(get($patient_selected)) && $patient_selected === TRUE): ?>
  <div id="plotly_container" class="container">
    <a href="https://plot.ly/~erdigokce/7/?share_key=vAhLGGPvYUyxofrRnaeKu2" target="_blank" title="HTS_1" style="display: block; text-align: center;"><img src="https://plot.ly/~erdigokce/7.png?share_key=vAhLGGPvYUyxofrRnaeKu2" alt="HTS_1" style="max-width: 100%;width: 600px;"  width="600" onerror="this.onerror=null;this.src='https://plot.ly/404.png';" /></a>
    <script data-plotly="erdigokce:7" sharekey-plotly="vAhLGGPvYUyxofrRnaeKu2" src="https://plot.ly/embed.js" async></script>
  </div>
  <div id="archive_container" class="container" style="display:none">
    <!-- draw graph from stored json data -->
  </div>
  <?php endif; ?>
</div>

<script src="app/js/hts_patient_logs.js" charset="utf-8"></script>

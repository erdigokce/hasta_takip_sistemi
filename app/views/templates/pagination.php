
<?php
echo $page_count.$page_number;
 ?>

<div class="row">
  <div class="col-md-offset-3"></div>
  <div class="col-md-6 col-md-offset-3">
    <ul class="pagination">
      <?php if ($page_count > 0) { ?>
        <?php for ($i=1; $i <= $page_count; $i++) { ?>
        <li <?php if($i == $page_number) echo "class='active'"; else echo "class=''"; ?>><a href="#" data-pg="<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
      <?php } else { ?>
        <li class="active"><a href="#" data-pg="1">1</a></li>
      <?php } ?>
    </ul>
  </div>
</div>

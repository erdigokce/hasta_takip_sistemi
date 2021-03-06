<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo "HTS - ".get($title); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootswatch Lumen Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url()."app/css/bootstrap-theme-lumen.css";?>">
    <!-- HTS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."app/css/hts_style.css";?>">

    <script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>";
      var page_no =  "<?php echo HTS_PAGE_NO; ?>";
      var records_per_page =  "<?php echo HTS_RECORDS_PER_PAGE; ?>";
    </script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTS Main Javascript -->
    <script src="<?php echo base_url()."app/js/hts.js";?>" charset="utf-8"></script>
  </head>

  <body>
    <div class="wait"></div>

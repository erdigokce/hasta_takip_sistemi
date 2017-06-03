  </body>
</html>
<script type="text/javascript">

  var windowHeight = $(window).height();

  var headerHeightFix = $("nav").css("margin-bottom");
  headerHeightFix = headerHeightFix.substr(0, headerHeightFix.length - 2);
  headerHeightFix = parseInt(headerHeightFix);

  var headerRealHeight = $("header").height() + headerHeightFix;

  var footerHeightFix = $("footer").css("margin-bottom");
  footerHeightFix = footerHeightFix.substr(0, footerHeightFix.length - 2);
  footerHeightFix = parseInt(footerHeightFix);

  var footerRealHeight = $("footer").height() - footerHeightFix;

</script>

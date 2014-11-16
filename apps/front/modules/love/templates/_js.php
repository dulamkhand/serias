<?php $host = sfConfig::get('app_host')?>

<script type="text/javascript">
$('.love16').mouseover(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love16.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove16.ico');
    }
}).mouseout(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove16.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love16.ico');
    }
});


$('.love24').mouseover(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love24.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove24.ico');
    }
}).mouseout(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove24.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love24.ico');
    }
});


function love(itemId, icosize)
{
  var id = '#love'+itemId;
  var alt = $(id).attr('alt');
  if(alt == 'Love!') {
	  $(id).attr('src', '<?php echo $host?>images/icons/love' + icosize + '.ico');
	  $(id).attr('alt', 'Unlove!');
  } else if(alt == 'Unlove!') {
	  $(id).attr('src', '<?php echo $host?>images/icons/unlove' + icosize + '.ico');
	  $(id).attr('alt', 'Love!');
  }
  
  $.ajax({
      url: "<?php echo url_for('love/toggle')?>",
      type : "POST",
      data: {itemId:itemId, alt:alt},
	  unsuccess: function(data) {
          if(alt == 'Love!') {
              $(id).attr('src', '<?php echo $host?>images/icons/unlove' + icosize + '.ico');
              $(id).attr('alt', 'Love!');
          } else if(alt == 'Unlove!') {
              $(id).attr('src', '<?php echo $host?>images/icons/love' + icosize + '.ico');
              $(id).attr('alt', 'Unlove!');
          }
      }
  });
}
</script>
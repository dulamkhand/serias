<?php $host = sfConfig::get('app_host')?>

<script type="text/javascript">
$('.love').mouseover(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
    } else if(alt == 'loved') {
        $(this).attr('alt') == 'Unlove!';
    } else if(alt == 'unloved') {
        $(this).attr('alt') == 'Love!';    
    }
}).mouseout(function() {
    var alt = $(this).attr('alt');
    if(alt == 'Love!') {
        $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
    } else if(alt == 'Unlove!') {
        $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
    } else if(alt == 'loved') {
        $(this).attr('alt') == 'Unlove!';
    } else if(alt == 'unloved') {
        $(this).attr('alt') == 'Love!';    
    }
});

function love(itemId, act)
{
  $.ajax({
      url: "<?php echo url_for('user/love')?>",
      type : "POST",
      data: {itemId:itemId, act:act},
      success: function(data) {
          if(act == 'love') {
              $(this).attr('src', '<?php echo $host?>images/icons/love.ico');
              $(this).attr('alt') == 'loved';
          } else if(act == 'unlove') {
              $(this).attr('src', '<?php echo $host?>images/icons/unlove.ico');
              $(this).attr('alt') == 'unloved';
          }
      }
  });
}
</script>
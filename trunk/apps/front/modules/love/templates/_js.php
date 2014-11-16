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
      url: "<?php echo url_for('love/toggle')?>",
      type : "POST",
      data: {itemId:itemId, act:act},
      success: function(data) {
          if(act == 'love') {
              $('#love'+itemId).attr('src', '<?php echo $host?>images/icons/love.ico');
              $('#love'+itemId).attr('alt', 'loved');
          } else if(act == 'unlove') {
              $('#love'+itemId).attr('src', '<?php echo $host?>images/icons/unlove.ico');
              $('#love'+itemId).attr('alt', 'unloved');
          }
      }
  });
}
</script>
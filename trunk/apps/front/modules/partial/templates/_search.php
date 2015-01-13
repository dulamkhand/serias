<div class="left" style="width:312px;margin:0 0 0 162px;position:relative;">
		<input type="text" name="search" id="search" class="left" style="background:#fff;width:300px;height:21px;padding:0 5px;line-height:22px;" autocomplete="off"
		      value="<?php echo $sf_params->get('search') ? $sf_params->get('search') : 'Хайлт'?>"/>
		<?php echo image_tag('icons/search-10-16.ico', array('style'=>'position:absolute;top:4px;right:4px;', 'id'=>'search-submit'))?>
		<?php echo image_tag('icons/loading-colorful.gif', array('style'=>'margin:5px 0 0 3px;display:none;', 'id'=>'search-loader'))?>
		<div id="search-result" style="display:none;position:absolute;z-index:1000;top:23px;left:0;padding:5px;
		      max-height:500px;overflow-y:scroll;background:#fff;border:1px solid #dedede;border-top:0;width:616px;">
		</div>
</div>

<script type="text/javascript">
$('#search').keyup(function() {
  $.ajax({
    url: "<?php echo url_for('main/search')?>",
    type: "POST",
    data: {search:$('#search').val()},
    beforeSend: function(){
        $('#search-loader').show();
    },
    success: function(data) {
        $('#search-loader').hide();
        $("#search-result").html(data);
        $("#search-result").slideDown();
    }
  });
  return false;
});

$('html').click(function() {
    $("#search-result").hide();
});


$('#search').click(function(){
    if($(this).val().trim() == "Хайлт") {
        $(this).val('');
    }
}).blur(function(){
    if($(this).val().trim() == "") {
        $(this).val('Хайлт');
    }
});

</script>

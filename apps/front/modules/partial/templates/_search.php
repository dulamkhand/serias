<div class="left" style="width:312px;margin:0 0 0 162px;position:relative;">
		<input type="text" name="search" id="search" autocomplete="off" value="<?php echo $sf_params->get('search') ? $sf_params->get('search') : 'ХАЙЛТ'?>"/>
		<?php echo image_tag('icons/search-10-16.ico', array('style'=>'position:absolute;top:4px;right:6px;', 'id'=>'search-submit'))?>
		<?php echo image_tag('icons/loading-colorful.gif', array('style'=>'margin:5px 0 0 3px;display:none;', 'id'=>'search-loader'))?>
		<div id="search-result" style="display:none;position:absolute;z-index:1000;top:24px;left:-1px;padding:5px;
		      max-height:500px;overflow-y:scroll;background:#fff;border:1px solid #000;border-top:0;width:652px;">
		</div>
</div>

<script type="text/javascript">
$('#search').keyup(function() {
	if($('#search').val().length > 2) {
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
	}
  return false;
});

$('html').click(function() {
    $("#search-result").hide();
});


$('#search').click(function(){
    if($(this).val().trim() == "ХАЙЛТ") {
        $(this).val('');
        $(this).css('color', '#333');
    }
}).blur(function(){
    if($(this).val().trim() == "") {
        $(this).val('ХАЙЛТ');
        $(this).css('color', '#aaa');
    }
});

</script>

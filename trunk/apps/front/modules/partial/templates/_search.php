<div style="position:relative;margin:10px 0;float:left;">
    <input type="text" name="search" id="search" class="left" style="width:300px;height:26px;padding:0 5px;" autocomplete="off"
          value="<?php echo $sf_params->get('search') ? $sf_params->get('search') : 'Хайлт'?>"/>
    <?php echo image_tag('icons/loading-colorful.gif', array('style'=>'margin:5px 0 0 3px;display:none;', 'id'=>'search-loader'))?>
    <div id="search-result" style="display:none;position:absolute;z-index:1000;top:27px;left:0;padding:5px;
          min-width:700px;max-height:700px;overflow-y:scroll;border-radius:1px;background:#fff;border:1px solid #4779B8;">
    </div>
</div>
<br clear="all">
<br clear="all">

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
        //$('#comment-area').val("Сайн байна уу, ");
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

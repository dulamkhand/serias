<?php $host = sfConfig::get('app_host')?>
<?php $rates = GlobalTable::doFetchArray('Rating', array('rate'), 
							 array('objectType'=>'item', 'objectId'=>$id, 'isActive'=>'all'));
$sum = 0;
foreach ($rates as $rate) {
		$sum +=	$rate['rate'];
}
$avgRate = number_format($sum/sizeof($rates), 1);
?>

<h6 style="font-size:40px;color:#ff6600;font-weight:bold;margin:0 0 10px 30px;">
    <?php echo $avgRate?>
</h6>
<br clear="all">
<div class="rating-f">
	  <select id="rateit" name="rating">
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
	      <option value="5">5</option>
	  </select>
</div>
<div class="upper left" style="color:#666;margin:3px 0 10px 15px;">
    <span id="nbRate"><?php echo sizeof($rates);?></span> УДАА ҮНЭЛСЭН<br>
    <span id="rateResult" style="color:red;"></span>
</div>

<script type="text/javascript">
$(document).ready(function () {
		$('#rateit').barrating({
				showSelectedRating:false,
				initialRating:<?php echo number_format($avgRate);?>,
				onSelect:function(value, text) {
        		$.ajax({
						    url: "<?php echo url_for('partial/rate')?>", 
						    type: "POST",
						    data: {objectId:<?php echo $id?>, rate:$('#rateit').val()},
						    beforeSend: function(){
                    $('#rateResult').html('<img src="<?php echo $host?>images/loading-colorful.gif" align="absmiddle"/>');
                },
						    success: function(data) {
                    $('#nbRate').val(parseInt($('#nbRate').val()) + 1);
                    $('#rateResult').html(data);
                }
					  });
        }
		});
});
</script>

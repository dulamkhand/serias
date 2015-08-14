<?php $host = sfConfig::get('app_host')?>
<!--mmdb rating-->
<div id="rating" class="left" style="margin:15px 0 15px 40px;width:280px;">
    <?php $rates = RatingTable::getInstance()->doFetchArray(array('rate'), 
    							 array('objectType'=>'item', 'objectId'=>$rs->getId(), 'isActive'=>'all'));
    $sum = 0;
    foreach ($rates as $rate) {
    		$sum +=	$rate['rate'];
    }
    $avgRate = number_format($sum/sizeof($rates), 1);
    ?>
    
    <h6 style="font-size:36px;color:#ff6600;font-weight:bold;margin:0 0 5px 39px;">
        <?php echo $avgRate?>
    </h6>
    <br clear="all">
    <div class="rating-f">
    	  <select id="rate-select" name="rating">
    	      <option value="1">1</option>
    	      <option value="2">2</option>
    	      <option value="3">3</option>
    	      <option value="4">4</option>
    	      <option value="5">5</option>
    	  </select>
    </div>
    <div class="upper left" style="margin:0 0 0 15px;">
        <span id="nbRate" style="color:#666;"><?php echo sizeof($rates);?></span> УДАА ҮНЭЛСЭН
    </div>
	<div class="upper left" id="rateResult" style="color:red;height:27px;margin:0 0 0 10px"></div>
</div>

<!--imdb rating-->
<div class="left" style="margin:38px 0 0 0;"><?php echo $rs->getRating();?></div>
<br clear="all">

<script type="text/javascript">
$(document).ready(function () {
		$('#rate-select').barrating({
				showSelectedRating:false,
				readonly:<?php echo $sf_user->getAttribute('rated'.$rs->getId()) ? "true" : "false"?>,
				initialRating:<?php echo number_format($avgRate);?>,
				onSelect:function(value, text) {
        		$.ajax({
					url: "<?php echo url_for('partial/rate')?>", 
					type: "POST",
					data: {objectId:<?php echo $rs->getId()?>, rate:$('#rate-select').val()},
					beforeSend: function(){
						$('#rateResult').html('<img src="<?php echo $host?>images/icons/loading-colorful.gif" style="float:left;margin:5px 0 0 5px"/>');
					},
					success: function(data) {
						if(data == 'Амжилттай үнэллээ!') {
							$('#nbRate').html(parseInt($('#nbRate').html()) + 1);
							$('#rating').attr("disabled", "disabled");
						}
						$('#rateResult').html(data);
						$('#rateResult').fadeIn(600);
					}
			  });
        }
		});
});
</script>

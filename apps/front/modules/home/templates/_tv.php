<h1>Телевизээр</h1>
<?php $rss = ItemTable::getInstance()->doFetchArray('Item', array('type, route, folder, image, title, year'), 
                                              array('limit'=>4, 'tv'=>array('mnb', '25', 'tv9', 'ubs')))?>
<div class="flexsliderTv">
  <ul class="slides">
    <?php foreach ($rss as $rs):?>
		<li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
			<?php echo image_tag('/u/'.$rs['folder'].'/'.$rs['image'], array('style'=>'float:left;box-shadow:0 0 4px #666;width:140px;height:200px;'))?>
			<!--<?php //echo $rs['title']?> (<?php //echo $rs['year']?>)-->
		</a></li>
    <?php endforeach;?>
  </ul>
</div><!--flexsliderTv-->

<script type="text/javascript">
$(window).load(function() {
  $('.flexsliderTv').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    itemWidth:140,
    itemHeight:200,
  });
});
</script>
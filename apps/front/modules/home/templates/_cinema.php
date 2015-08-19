<h1>Кино театрт</h1>
<?php $rss = ItemTable::getInstance()->doExecute(array('*'), array());?>
<div class="flexslider">
  <ul class="slides">
    <?php foreach ($rss as $rs):?>
		<?php $item = $rs->getItem()?>
		<li style="position:relative;">
			<a href="<?php echo url_for('page/show?route='.$item['route'])?>">
				<?php echo image_tag('/u/'.$item['folder'].'/'.$item['image'], array('style'=>'float:left;width:500px;height:200px;'))?>
			</a>
			<span class="left" style="margin:0 0 0 10px;width:220px;height:200px;">
				<a href="<?php echo url_for('page/show?route='.$item['route'])?>">
					<h3 style="border:0;"><?php echo $item['title']?> (<?php echo $item['year']?>)</h3>
				</a>
				<?php echo GlobalLib::clearOutput($item['summary_mn'])?>
				<br clear="all">
				<?php echo GlobalLib::clearOutput($rs['details'])?>
			</span>
            <br clear="all">
			<a href="#<?php // echo ?>" style="left:0;bottom:0;position:absolute;">
				<?php echo image_tag('cinema-'.$rs['cinema'].'.png', array('style'=>'max-width:100px;max-height:120px;'));?>
			</a>
		</li>
    <?php endforeach;?>
  </ul>
</div><!--flexslider-->
<br clear="all">

<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    itemWidth:800,
    itemHeight:200,
  });
});
</script>
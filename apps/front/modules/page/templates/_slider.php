<?php $rss = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), 
                                              array('limit'=>30))?>
<div class="flexslider">
  <ul class="slides">
    <?php foreach ($rss as $rs):?>
      <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
            <?php echo image_tag('/u/'.$rs['folder'].'/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:140px;max-height:210px;'))?>
            <span class="left" style="line-height:22px;margin:5px 0 0 0;"><?php echo $rs['title']?> (<?php echo $rs['year']?>)</span>
						<br clear="all">
      </a></li>
    <?php endforeach;?>
  </ul>
</div><!--flexslider-->

<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    itemWidth:200,
    itemHeight:50,
  });
});
</script>
<div id="rightside">
		<!--banner-->
		<?php $bbs = BannerTable::getInstance()->doFetchArray(array('path', 'ext', 'link', 'target'), array('position'=>'right', 'limit'=>5));?>
		<?php if(isset($bbs[0])) include_partial("partial/banner", array('rs'=>$bbs[0], 'width'=>180, 'height'=>300));?>

		<!--new-->
	  <h3>Манай санд нэмэгдсэн</h3>
		<?php $rss = ItemTable::getInstance()->doFetchArray(array('route, title, year'), array('limit'=>10))?>
		<ul>
	  <?php foreach ($rss as $rs):?>
	  		<?php include_partial('page/box-xxs', array('rs'=>$rs));?>
	  <?php endforeach?>
	  <a href="#<?php //echo url_for('')?>" title="Цааш">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
		</ul>
    <br clear="all">

		<!--banner-->
		<?php if(isset($bbs[1])) include_partial("partial/banner", array('rs'=>$bbs[1], 'width'=>180, 'height'=>300));?>
		
    <?php $rss = ItemTable::getInstance()->doFetchArray(array('route, title, year, boxoffice, boxoffice_mn, thisweek, comingsoon'), 
                 array('limit'=>80, 'rightside'=>1, 'orderBy'=>'boxoffice ASC, boxoffice_mn ASC, title ASC'))?>
    <h3>Box Office</h3>
    <ul>
    <?php $i=0; foreach ($rss as $rs):?>
        <?php if($rs['boxoffice'] > 0):?>
		        <?php if($i++ == 10) break;?>
            <?php include_partial('page/box-xxs', array('rs'=>$rs));?>
        <?php endif?>
    <?php endforeach?>
    <a href="#<?php //echo url_for('')?>" title="Цааш">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
    </ul>
		<br clear="all">

		<!--banner-->
		<?php if(isset($bbs[2])) include_partial("partial/banner", array('rs'=>$bbs[2], 'width'=>180, 'height'=>300));?>
		
		<h3>Box Office Mongolia</h3>
    <ul>
    <?php $i=0; foreach ($rss as $rs):?>
        <?php if($rs['boxoffice_mn'] > 0):?>
		        <?php if($i++ == 10) break;?>
            <?php include_partial('page/box-xxs', array('rs'=>$rs));?>
        <?php endif?>
    <?php endforeach?>
    <a href="#<?php //echo url_for('')?>" title="Цааш">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
    </ul>
		<br clear="all">
		
		<!--banner-->
		<?php if(isset($bbs[3])) include_partial("partial/banner", array('rs'=>$bbs[3], 'width'=>180, 'height'=>300));?>
		
		<h3>Энэ 7 хоногт нээлт хийх</h3>
    <ul>
    <?php $i=0; foreach ($rss as $rs):?>
        <?php if($rs['thisweek'] > 0):?>
		        <?php if($i++ == 10) break;?>
            <?php include_partial('page/box-xxs', array('rs'=>$rs));?>
        <?php endif?>
    <?php endforeach?>
    <a href="#<?php //echo url_for('')?>" title="Цааш">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
    </ul>
    <br clear="all">
    
    <h3>Тун удахгүй</h3>
    <ul>
    <?php $i=0; foreach ($rss as $rs):?>
        <?php if($rs['comingsoon'] > 0):?>
		        <?php if($i++ == 10) break;?>
            <?php include_partial('page/box-xxs', array('rs'=>$rs));?>
        <?php endif?>
    <?php endforeach?>
    <a href="#<?php //echo url_for('')?>" title="Цааш">
	  		<?php echo image_tag('icons/more2.png', array('width'=>25))?>
	  </a>
    </ul>
    <br clear="all">
    
    <!--banner-->
		<?php if(isset($bbs[4])) include_partial("partial/banner", array('rs'=>$bbs[4], 'width'=>180, 'height'=>300));?>

    <!--bests-->
    <h3>Шилдэгүүд</h3>
    <?php foreach (GlobalLib::getArray('bests') as $k=>$v):?>
        <a href="<?php echo url_for('page/bests?bestType='.$k)?>"><?php echo $v?></a><br>
    <?php endforeach?>
    <br clear="all">
    <br clear="all">
    
    <!--banner-->
		<?php if(isset($bbs[5])) include_partial("partial/banner", array('rs'=>$bbs[5], 'width'=>180, 'height'=>300));?>

</div><!--rightside-->
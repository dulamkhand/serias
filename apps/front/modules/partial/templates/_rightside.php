<div id="rightside">
		<!--banner-->
		<?php $rs = BannerTable::getInstance()->doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-top'));?>
		<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>180, 'height'=>300));?>

		<!--new-->
	  <h3 style="text-decoration:none;">Манай санд нэмэгдсэн</h3>
		<?php $rss = ItemTable::getInstance()->doFetchArray('Item', array('route, title, year'), array('limit'=>10))?>
		<ul>
			  <?php foreach ($rss as $rs):?>
				  <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
					  <?php echo $rs['title']?> (<?php echo $rs['year']?>)
				  </a></li>
			  <?php endforeach?>
		</ul>
    
		<!--banner-->
		<?php $rs = BannerTable::getInstance()->doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-middle'));?>
		<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>180, 'height'=>300));?>
    
		
    <br clear="all">
    <?php $rss = ItemTable::getInstance()->doFetchArray(array('route, title, year, boxoffice, boxoffice_mn, thisweek, comingsoon'), 
                 array('limit'=>50, 'where'=>'boxoffice > 0 or boxoffice_mn > 0 or thisweek > 0 or comingsoon > 0', 
                       'orderBy'=>'boxoffice ASC, boxoffice_mn ASC, title ASC'))?>
    <h3>Box Office</h3>
    <ul>
      <?php foreach ($rss as $rs):?>
          <?php if($rs['boxoffice'] > 0):?>
              <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                  <?php echo $rs['boxoffice']?>. <?php echo $rs['title']?> (<?php echo $rs['year']?>)
              </a></li>
          <?php endif?>
      <?php endforeach?>
    </ul>
		<br clear="all">
		
		<h3>Box Office Mongolia</h3>
    <ul>
      <?php foreach ($rss as $rs):?>
          <?php if($rs['boxoffice_mn'] > 0):?>
              <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                  <?php echo $rs['boxoffice_mn']?>. <?php echo $rs['title']?> (<?php echo $rs['year']?>)
              </a></li>
          <?php endif?>
      <?php endforeach?>
    </ul>
		<br clear="all">
		
		<h3>Энэ 7 хоногт нээлт хийх</h3>
    <ul>
    <?php foreach ($rss as $rs):?>
        <?php if($rs['thisweek'] > 0):?>
            <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                <?php echo $rs['title']?> (<?php echo $rs['year']?>)
            </a></li>
        <?php endif?>
    <?php endforeach?>
    </ul>
    <br clear="all">
    
    <h3>Тун удахгүй</h3>
    <ul>
    <?php foreach ($rss as $rs):?>
        <?php if($rs['comingsoon'] > 0):?>
            <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                <?php echo $rs['title']?> (<?php echo $rs['year']?>)
            </a></li>
        <?php endif?>
    <?php endforeach?>
    </ul>
    <br clear="all">

    <!--bests-->
    <div style="margin:0px 0 0 10px;">
    		<br clear="all">
        <h3>Шилдэгүүд</h3>
        <?php foreach (GlobalLib::getArray('bests') as $k=>$v):?>
            <a href="<?php echo url_for('page/bests?bestType='.$k)?>"><?php echo $v?></a><br>
        <?php endforeach?>
        <br clear="all">
    </div>
    <br clear="all">
	
    <div class="box-right">
        <h3 style="text-decoration:none;">Реклам байршуулах</h3>
        99258807, 99071053
    </div>
    <br clear="al">

    <div class="box-right">
        <h3 style="text-decoration:none;">Холбоо барих</h3>
        99258807, 99071053, mmdb.llc@gmail.com
    </div>
    
</div><!--rightside-->
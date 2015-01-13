<div id="rightside">
		<?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-top', 'limit'=>1));?>
		<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>180, 'height'=>300));?>

		<div class="box-right">
			  <h3 style="text-decoration:none;">Манай санд нэмэгдсэн</h3>
				<?php $rss = GlobalTable::doFetchArray('Item', 
							array('type, route, image, title, year, boxoffice, thisweek, comingsoon'), array('limit'=>30))?>
				<ul>
					  <?php foreach ($rss as $rs):?>
						  <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
							  <?php echo $rs['title']?> (<?php echo $rs['year']?>)
						  </a></li>				  
					  <?php endforeach?>
				</ul>
		</div>
    
		<!--banners-->
		<?php $rss = GlobalTable::doFetchArray('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-middle', 'limit'=>3));?>
		<?php foreach ($rss as $rs):?>
				<?php if($rs):?>
				    <div class="box-right">
				        <span class="right" style="color:#666;">Сурталчилгаа</span>
				        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>180, 'height'=>300));?>
				    </div>
    		<?php endif?>
    <?php endforeach?>
    
	
<br clear="all">
    <div style="margin:0px 0 0 10px;">
    		<br clear="all">
        <h3>Шилдэгүүд</h3>
        <?php foreach (GlobalLib::getArray('bests') as $k=>$v):?>
            <a href="<?php echo url_for('page/bests?bestType='.$k)?>"><?php echo $v?></a><br>
        <?php endforeach?>
        
        <br clear="all">
        <?php $rss = GlobalTable::doFetchArray('Item', array('type, route, image, title, year, boxoffice, thisweek, comingsoon'), 
                                              array('rightside'=>1, 'limit'=>30, 'orderBy'=>'boxoffice ASC, title ASC'))?>
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
    </div>
    <br clear="all">
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
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
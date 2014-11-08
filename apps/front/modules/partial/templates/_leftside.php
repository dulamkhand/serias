<?php $host = sfConfig::get('app_host')?>
<div id="leftside">

    <a href="<?php echo url_for('@homepage')?>">
        <?php echo image_tag('logo-200x130.png', array('style'=>'margin:10px 0 5px 0;max-width:170px;'))?>
    </a>
  
    <ul id="mainmenu">
        <?php $rss = GlobalLib::getArray('type_mn')?>
        <?php foreach ($rss as $k=>$v):?>
            <li><a href="<?php echo url_for('page/index?type='.$k)?>" class="<?php echo ($k == $sf_params->get('type')) ? 'active' : ''?>">
            		<?php echo $v?>
        		</a></li>
        <?php endforeach;?>
    </ul>
  
    <br clear="all">
    <div style="float:left;margin:0 0 0 10px;" class="fb-like" data-href="<?php echo $host?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
    <div style="float:left;margin:0 0 0 10px;" class="fb-follow" data-href="<?php echo $host?>" data-layout="box_count" data-colorscheme="light" data-show-faces="false"></div>
  
    <br clear="all">
    <div style="margin:0px 0 0 10px;">
    		<br clear="all">
        <h3>Шилдэгүүд</h3>
        <?php foreach (GlobalLib::getArray('bests') as $k=>$v):?>
            <a href="<?php echo url_for('page/bests?g='.$k)?>"><?php echo $v?></a><br>
        <?php endforeach?>
        
        <br clear="all">
        <?php $rss = GlobalTable::doFetchArray('Item', array('type, route, image, title, year, boxoffice, thisweek, comingsoon'), 
                                              array('rightside'=>1, 'limit'=>30, 'orderBy'=>'boxoffice ASC, title ASC'))?>
        <h3>Box Office</h3>
        <ul>
          <?php foreach ($rss as $rs):?>
              <?php if($rs['boxoffice'] > 0):?>
                  <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                      <?php echo $rs['boxoffice']?>. <?php echo $rs['title']?>
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
                    <?php echo $rs['title']?>
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
                    <?php echo $rs['title']?>
                </a></li>
            <?php endif?>
        <?php endforeach?>
        </ul>
    </div>
    <br clear="all">
    <br clear="all">
    
</div><!--leftside-->

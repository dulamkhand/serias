<div id="leftside">

    <a href="<?php echo url_for('@homepage')?>">
        <?php echo image_tag('logo-150.png', array('style'=>'margin:10px 0 5px 0;'))?>
    </a>
  
    <ul id="mainmenu">
        <?php $rss = GlobalLib::getArray('type_mn')?>
        <?php foreach ($rss as $k=>$v):?>
            <li><a href="<?php echo url_for('page/index?type='.$k)?>"><?php echo $v?></a></li>    
        <?php endforeach;?>
    </ul>
  
    <br clear="all">
    <div class="fb-like" data-href="http://imdb/index.php" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
  
    <br clear="all">
    <div style="margin:0 0 0 10px;">
        <h3 style="font-size:13px;">Төрөл жанр</h3>
        <?php foreach (GlobalLib::getArray('genre_mn') as $k=>$v):?>
            <a href="<?php echo url_for('page/index?type=movie&g='.$k)?>"><?php echo $v?></a><br>
        <?php endforeach?>  
        
        <br clear="all">
        <?php $rss = GlobalTable::doFetchArray('Item', array('rightside'=>1, 'limit'=>30, 'orderBy'=>'boxoffice ASC, title ASC'))?>
        <h3 style="font-size:13px;">Box Office</h3>
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
        <h3 style="font-size:13px;">Энэ 7 хоногт нээлт хийх</h3>
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
        <h3 style="font-size:13px;">Тун удахгүй</h3>
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


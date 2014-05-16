<div id="rightside">
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
  
</div><!--rightside-->
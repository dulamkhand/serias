<?php $color = GlobalLib::getValue('colors', 'movie')?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>КИНО</h2>
    <?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'movie')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss, 'color'=>$color));?>    
</div>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', 'series')?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>ЦУВРАЛ</h2>
    <?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'series')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss, 'color'=>$color));?>
</div>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', 'tvshow')?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>ТВ ШОУ</h2>
    <?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'tvshow')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss, 'color'=>$color));?>
</div>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', 'mn')?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>МОНГОЛ КИНО</h2>
    <?php echo image_tag('items.png')?>
    <br clear="all">
    <?php echo image_tag('items.png')?>
</div>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', 'nonfiction')?>
<div class="box-home" style="background:<?php echo $color?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>БАРИМТАТ КИНО</h2>
    <?php echo image_tag('movies.png')?>
    <br clear="all">
    <?php echo image_tag('movies.png')?>
</div>
<br clear="all">

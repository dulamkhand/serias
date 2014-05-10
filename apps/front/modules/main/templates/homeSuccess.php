<div class="box-home" style="background:<?php echo GlobalLib::getValue('colors', 'movie')?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>КИНО</h2>
    <?php $rss = Doctrine::getTable('Serias')->createQuery()->where('type = ?', 'movie')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss));?>    
</div>
<br clear="all">

<div class="box-home" style="background:<?php echo GlobalLib::getValue('colors', 'serias')?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>ЦУВРАЛ</h2>
    <?php $rss = Doctrine::getTable('Serias')->createQuery()->where('type = ?', 'serias')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss));?>
</div>
<br clear="all">

<div class="box-home" style="background:<?php echo GlobalLib::getValue('colors', 'tvshow')?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>ТВ ШОУ</h2>
    <?php $rss = Doctrine::getTable('Serias')->createQuery()->where('type = ?', 'tvshow')->fetchArray();?>
    <?php include_partial('partial/box140', array('rss'=>$rss));?>
</div>
<br clear="all">

<div class="box-home" style="background:<?php echo GlobalLib::getValue('colors', 'mn')?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>МОНГОЛ КИНО</h2>
    <?php echo image_tag('serias.png')?>
    <br clear="all">
    <?php echo image_tag('serias.png')?>
</div>
<br clear="all">

<div class="box-home" style="background:<?php echo GlobalLib::getValue('colors', 'nonfiction')?>;">
    <a href="#" class="toggle"><?php echo image_tag('icons/toggle.png', array())?></a>
    <h2>БАРИМТАТ КИНО</h2>
    <?php echo image_tag('movies.png')?>
    <br clear="all">
    <?php echo image_tag('movies.png')?>
</div>
<br clear="all">

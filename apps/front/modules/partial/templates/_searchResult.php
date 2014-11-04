<h3 style="margin:0 0 5px 0"><?php echo GlobalLib::getValue('type_mn', 'movie')?></h3>
<?php include_partial('page/boxwhite', array('rss'=>$arr['movie'], 'type'=>'movie', 'width'=>90, 'height'=>170));?>
<h3 style="margin:0 0 5px 0"><?php echo GlobalLib::getValue('type_mn', 'series')?></h3>
<?php include_partial('page/boxwhite', array('rss'=>$arr['series'], 'type'=>'series', 'width'=>90, 'height'=>170));?>
<h3 style="margin:0 0 5px 0"><?php echo GlobalLib::getValue('type_mn', 'tvshow')?></h3>
<?php include_partial('page/boxwhite', array('rss'=>$arr['tvshow'], 'type'=>'tvshow', 'width'=>90, 'height'=>170));?>
<h3 style="margin:0 0 5px 0"><?php echo GlobalLib::getValue('type_mn', 'mn')?></h3>
<?php include_partial('page/boxwhite', array('rss'=>$arr['mn'], 'type'=>'mn', 'width'=>90, 'height'=>170));?>
<h3 style="margin:0 0 5px 0"><?php echo GlobalLib::getValue('type_mn', 'nonfiction')?></h3>
<?php include_partial('page/boxwhite', array('rss'=>$arr['nonfiction'], 'type'=>'nonfiction', 'width'=>90, 'height'=>170));?>
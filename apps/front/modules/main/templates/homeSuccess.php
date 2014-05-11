<?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'movie')->fetchArray();?>
<?php include_partial('partial/colorbox', array('rss'=>$rss, 'type'=>'movie'));?>

<?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'series')->fetchArray();?>
<?php include_partial('partial/colorbox', array('rss'=>$rss, 'type'=>'series'));?>

<?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'tvshow')->fetchArray();?>
<?php include_partial('partial/colorbox', array('rss'=>$rss, 'type'=>'tvshow'));?>

<?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'mn')->fetchArray();?>
<?php include_partial('partial/colorbox', array('rss'=>$rss, 'type'=>'mn'));?>

<?php $rss = Doctrine::getTable('Item')->createQuery()->where('type = ?', 'nonfiction')->fetchArray();?>
<?php include_partial('partial/colorbox', array('rss'=>$rss, 'type'=>'nonfiction'));?>

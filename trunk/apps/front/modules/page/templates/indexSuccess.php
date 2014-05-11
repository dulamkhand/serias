<?php include_partial('partial/colorbox', array('rss'=>$pager->getResults(), 'type'=>$type));?>

<br clear="all">
<?php echo pager($pager, 'page/index?type='.$type)?>
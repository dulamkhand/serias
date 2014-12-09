<?php include_partial('page/boxcolor', array('rss'=>$arr['movie'], 'type'=>'movie', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['series'], 'type'=>'series', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['tvshow'], 'type'=>'tvshow', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['mn'], 'type'=>'mn', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['nonfiction'], 'type'=>'nonfiction', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>

<?php include_partial('love/js', array());?>
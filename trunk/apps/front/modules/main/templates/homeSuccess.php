<?php include_partial('page/boxcolor', array('rss'=>$arr['movie'], 'type'=>'movie', 'more'=>1, 'width'=>140, 'height'=>250));?>


<?php $host = sfConfig::get('app_host')?>
<div>
    <object width="825" height="100" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
        <param value="<?php echo $host?>u/b/s5.swf" name="movie">
        <object width="825" height="100" data="<?php echo $host?>u/b/s5.swf" type="application/x-shockwave-flash" wmode="transparent">
        </object>
    </object>
    <?php //echo image_tag('/u/b/tdbm.png', array())?>
</div>


<?php include_partial('page/boxcolor', array('rss'=>$arr['series'], 'type'=>'series', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['tvshow'], 'type'=>'tvshow', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['mn'], 'type'=>'mn', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>
<?php include_partial('page/boxcolor', array('rss'=>$arr['nonfiction'], 'type'=>'nonfiction', 'more'=>1, 'width'=>140, 'height'=>250, 'loves'=>$loves));?>

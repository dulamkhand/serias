<div id="rightside">
		<?php include_partial('user/login', array())?>

    <h3>Манай санд шинээр нэмэгдсэн</h3>
    <ul>
        <?php $rss = array();?>
        <?php foreach ($rss as $rs):?>
            <?php if($rs['comingsoon'] > 0):?>
                <li><a href="<?php echo url_for('page/show?route='.$rs['route'])?>">
                    <?php echo $rs['title']?>
                </a></li>
            <?php endif?>
        <?php endforeach?>
    </ul>
    
    <br clear="all">
    <div style="color:#666;">
        Сурталчилгаа
        <?php echo image_tag('/u/b/d2529a4d2044ade53c1cc340f2f38649497cbe29.jpg', array('width'=>200))?>
    </div>
    
    <br clear="all">
    <br clear="all">
    <div style="color:#666;">
        Сурталчилгаа
        <a href="http://www.dagina.mn/index.php" target="_blank">
            <?php echo image_tag('/u/b/dagina.png', array('width'=>200))?>
        </a>
    </div>
    
    <br clear="all">
    <br clear="all">
    <div style="color:#666;">
        Сурталчилгаа
        <a href="http://www.urin-essence.com/girasole/firewall/web/index.php" target="_blank">
            <?php echo image_tag('/u/b/firewall.png', array('width'=>180))?>
        </a>
    </div>
    
    <br clear="all">
    <br clear="all">
    <h3>Сурталчилгаа байршуулах</h3>
    99258807, 99071053
    
    <br clear="all">
    <br clear="all">
    <h3>Холбоо барих</h3>
    БЗД, 14-р хороо, Энхтайваны өргөн чөлөө, 
    Apple төв 1 тоот<br>
    99258807, 99071053
    
</div><!--rightside-->
<div id="rightside">
    <div id="socials" style="z-index:1000;">
        <?php include_partial('partial/socials', array());?>    
    </div>
    <script type="text/javascript">
        $("#socials").sticky({topSpacing:0});
    </script>

    <div class="box-right">
		    <?php include_partial('user/login', array())?>
		</div>

		<div class="box-right">
		    <h3 style="text-decoration:none;">Манай санд шинээр нэмэгдсэн</h3>
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
		</div>
    
    <div class="box-right">
        <span style="color:#666;">Сурталчилгаа</span>
        <a href="http://www.dagina.mn/index.php" target="_blank">
            <?php echo image_tag('/u/b/dagina.png', array('width'=>180))?>
        </a>
    </div>
    
    <div class="box-right">
        <span style="color:#666;">Сурталчилгаа</span>
        <a href="http://www.urin-essence.com/girasole/firewall/web/index.php" target="_blank">
            <?php echo image_tag('/u/b/firewall.png', array('width'=>180))?>
        </a>
    </div>
    
    <div class="box-right">
        <h3 style="text-decoration:none;">Сурталчилгаа байршуулах</h3>
        99258807, 99071053
    </div>
    <br clear="al">

    <div class="box-right">
        <h3 style="text-decoration:none;">Холбоо барих</h3>
        99258807, 99071053, mmdb.llc@gmail.com
    </div>
    
</div><!--rightside-->
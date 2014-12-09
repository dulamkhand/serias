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
        <?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-top', 'limit'=>1));?>
        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>160, 'height'=>300));?>
    </div>
    
    <div class="box-right">
        <span style="color:#666;">Сурталчилгаа</span>
        <?php $rs = GlobalTable::doFetchOne('Banner', array('path', 'ext', 'link', 'target'), array('position'=>'right-middle', 'limit'=>1));?>
        <?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>160, 'height'=>300));?>
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
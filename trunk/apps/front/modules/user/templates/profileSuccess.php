<br clear="all">
<h1>Таны дуртай кинонууд</h1>

<?php foreach($pager->getResults() as $rs_love):?>
    <?php $rs = GlobalTable::doFetchOne('Item', array('type, route, image, title, year'), array('id'=>$rs_love->get('object_id')));?>
    <?php if($rs):?>
        <div style="width:90px;height:170px;margin:0 5px 5px 0;position:relative;" class="left">
            <a href="<?php echo url_for('page/show?route='.$rs['route'])?>" style="color:#fff;" title="<?php echo $rs['title']?>">
                <?php echo image_tag('/u/m/t140-'.$rs['image'], array('style'=>'box-shadow:0 0 4px #666;max-width:90px'))?>
                <br clear="all">
                <span style="line-height:13px;color:#000;"><?php echo mb_strlen($rs['title']) > 22 ? utf8_substr($rs['title'], 0 , 20).'..' : $rs['title'];?> (<?php echo $rs['year']?>)</span>
            </a>
        </div>
    <?php endif?>
<?php endforeach;?>

<br clear="all">
<br clear="all">
<?php echo pager($pager, 'user/profile')?>
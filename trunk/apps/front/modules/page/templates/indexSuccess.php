<?php $y = $sf_params->get('y');?>
<?php $l = $sf_params->get('l');?>
<?php $g = $sf_params->get('g');?>
<div class="pager">
    <span class="left" style="background:#dedede;padding:7px 5px;font-weight:bold;">Төрөл жанр</span>
    <?php foreach (GlobalLib::getArray('genre') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&g='.$k)?>" class="<?php if($g == $k) echo 'selected'?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">

    <span class="left" style="background:#dedede;padding:7px 5px;font-weight:bold;">Бүтээгдсэн он</span>
    <?php foreach (GlobalLib::getArray('years') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&y='.$k)?>" class="<?php if($y == $k) echo 'selected'?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">
    
    <span class="left" style="background:#dedede;padding:7px 5px;font-weight:bold;">Нэрний эхний үсэг</span>
    <?php foreach (GlobalLib::getArray('alpha_en') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&l='.$k)?>" class="<?php if($l == $k) echo 'selected'?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">
    
</div>
<br clear="all">

<?php include_partial('partial/colorbox', array('rss'=>$pager->getResults(), 'type'=>$type, 'width'=>140, 'height'=>250));?>

<br clear="all">
<?php echo pager($pager, 'page/index?type='.$type)?>


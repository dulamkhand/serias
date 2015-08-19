<?php $y = $sf_params->get('y');?>
<?php $l = $sf_params->get('l');?>
<?php $g = $sf_params->get('g');?>
<?php $uri = 'page/index?';?>

<div class="pager">
    <span class="left" style="background:#dedede;padding:5px;font-weight:bold;">Төрөл жанр</span>
    <?php foreach (GlobalLib::getArray('genre_mn') as $k=>$v):?>
        <a href="<?php echo url_for($uri.'y='.$y.'&l='.$l.'&g='.$k)?>" class="<?php if($g == $k) echo 'selected'?>">
            <?php echo $v?></a>
    <?php endforeach?>
    <a href="<?php echo url_for($uri.'y='.$y.'&l='.$l)?>" class="em">Цэвэрлэх</a>
    <br clear="all">
    <br clear="all">

    <span class="left" style="background:#dedede;padding:5px;font-weight:bold;">Бүтээгдсэн он</span>
    <?php foreach (GlobalLib::getArray('years') as $k=>$v):?>
        <a href="<?php echo url_for($uri.'y='.$k.'&l='.$l.'&g='.$g)?>" class="<?php if($y == $k) echo 'selected'?>">
           <?php echo $v?></a>
    <?php endforeach?>
    <a href="<?php echo url_for($uri.'&l='.$l.'&g='.$g)?>" class="em">Цэвэрлэх</a>
    <br clear="all">
    <br clear="all">
    
    <span class="left" style="background:#dedede;padding:5px;font-weight:bold;">Эхний үсэг</span>
    <?php foreach (GlobalLib::getArray('alpha_en') as $k=>$v):?>
        <a href="<?php echo url_for($uri.'y='.$y.'&l='.$k.'&g='.$g)?>" class="<?php if($l == $k) echo 'selected'?>">
            <?php echo $v?></a>
    <?php endforeach?>
    <a href="<?php echo url_for($uri.'y='.$y.'&g='.$g)?>" class="em">Цэвэрлэх</a>
    <br clear="all">
    
</div>
<br clear="all">

<?php
foreach ($pager->getResults() as $rs) {
		include_partial('page/box-s', array('rs'=>$rs));	
}
?>

<br clear="all">
<br clear="all">
<?php echo pager($pager, $uri.'y='.$y.'&l='.$l.'&g='.$g)?>

<?php include_partial('love/js', array());?>
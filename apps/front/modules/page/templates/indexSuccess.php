<div class="pager">
    <span class="left" style="background:#dedede;padding:7px 5px;">Бүтээгдсэн он</span>
    <?php foreach (GlobalLib::getArray('years') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&y='.$k)?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">
    
    <span class="left" style="background:#dedede;padding:7px 5px;">Нэрний эхний үсэг</span>
    <?php foreach (GlobalLib::getArray('alpha_en') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&l='.$k)?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">
    
    <span class="left" style="background:#dedede;padding:7px 5px;">Төрөл жанр</span>
    <?php foreach (GlobalLib::getArray('genre') as $k=>$v):?>
        <a href="<?php echo url_for('page/index?type='.$type.'&g='.$k)?>"><?php echo $v?></a>
    <?php endforeach?>
    <br clear="all">
</div>
<br clear="all">

<?php include_partial('partial/colorbox', array('rss'=>$pager->getResults(), 'type'=>$type));?>

<br clear="all">
<?php echo pager($pager, 'page/index?type='.$type)?>


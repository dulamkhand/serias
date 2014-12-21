<?php if($tmp = $rs->getOfficialLink1()):?>
<a target="_blank" title="Official Facebook page" class="left" href="<?php echo $rs->getOfficialLink1();?>">
    <h2 class="left" style="color:#222;">Албан ёсны</h2>
    <?php echo image_tag('icons/off-fb.png', array('class'=>'left'))?>
    <h2 class="left" style="color:#222;margin:0 0 0 -6px;">acebook хуудас</h2>
</a>
<?php endif?>

<?php if($tmp = $rs->getOfficialLink2()):?>
<a target="_blank" title="Official website" class="left" style="margin:0 0 0 8px;" href="<?php echo $rs->getOfficialLink2();?>">
    <h2 class="left" style="color:#222;">Албан ёсны</h2>
    <?php echo image_tag('icons/off-www.png', array('class'=>'left', 'style'=>'margin:2px 0 0 0'))?>
    <h2 class="left" style="color:#222;margin:0 0 0 -4px;">eb хуудас</h2>
</a>
<?php endif?>
<br clear="all">
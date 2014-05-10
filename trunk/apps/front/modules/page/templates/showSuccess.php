<?php $host = sfConfig::get('app_host')?>

<?php $color = GlobalLib::getValue('colors', $rs->getType()) ?>
<div class="box-home" style="background:<?php echo $color?>;">
    <h2><?php echo $rs?></h2>
    <?php echo image_tag('/u/m/'.$rs->getImage(), array('class'=>'left'))?>
    <div class="left ml10px" style="color:#fff;">
        <?php echo $rs->getSummary();?>
    </div>
    <br clear="all">
</div>

<div class="box-home" style="background:#dedede;border:1px solid #ccc;">
  
    <?php $links = Doctrine::getTable('Link')->createQuery()
                      ->where('item_id =?', $rs->getId())
                      ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
                      ->fetchArray();?>
    <?php foreach($links as $rs):?>
        <h2 style="color:#666"><?php echo 'S'.$rs['season'].'E'.$rs['episode'].' '.$rs['title']?></h2>
        <a href="<?php echo $rs['link']?>" target="_blank" style="color:#000;">
            <?php echo $rs['link']?>
        </a>
        <br clear="all">
    <?php endforeach;?>  
    <br clear="all">
</div>
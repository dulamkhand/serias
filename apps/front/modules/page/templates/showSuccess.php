<?php $host = sfConfig::get('app_host')?>

<div class="box-home" style="background:#4D9804;">
    <h2><?php echo $rs?></h2>
    <?php echo image_tag('/u/m/'.$rs->getImage(), array('class'=>'left'))?>
    <div class="left ml10px;">
        <?php echo $rs->getSummary();?>
    </div>
    <br clear="all">
</div>

<div class="box-home" style="background:#dedede;border:1px solid #ccc;">
    <?php $links = Doctrine::getTable('Link')->createQuery()->where('item_id', $rs->getId());?>
    <?php foreach($links as $link):?>  
      <a href="<?php echo $link?>" target="_blank">
          <?php echo $link?>
      </a>
      <br clear="all">
    <?php endforeach;?>  
</div>
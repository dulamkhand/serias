<?php $host = sfConfig::get('app_host')?>

<?php $link = Doctrine::getTable('Link')->createQuery()
          ->where('item_id =?', $rs->getId())
          ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
          ->fetchOne();?>
<iframe width="900" height="640" scrolling="no" frameborder="0" src="<?php echo $link['link']?>" 
        framespacing="0" id="hmovie" style="display: inline;"></iframe>


<?php if($rs->getType() == 'movie'):?>
    <?php $link = Doctrine::getTable('Link')->createQuery()
              ->where('item_id =?', $rs->getId())
              ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
              ->fetchOne();?>
    <iframe width="900" height="640" scrolling="no" frameborder="0" src="<?php echo $link['link']?>" 
            framespacing="0" id="hmovie" style="display: inline;"></iframe>

<?php elseif($rs->getType() == 'series'):?>
    

<?php elseif($rs->getType() == 'tvshow'):?>
    
<?php elseif($rs->getType() == 'mn'):?>
    
<?php elseif($rs->getType() == 'nocfiction'):?>
    
<?php endif?>
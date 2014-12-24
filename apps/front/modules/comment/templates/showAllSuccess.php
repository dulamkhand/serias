<?php $rss = Doctrine::getTable('Comment')->doFetchArray(array('id', 'name', 'text', 'ip_address', 'user_id'), 
                                                         array('objectType'=>$objectType, 'objectId'=>$objectId));?>
<?php foreach ($rss as $rs):?>
    <?php include_partial('comment/box', array('rs'=>$rs));?>
<?php endforeach;?>
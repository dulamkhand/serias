<br clear="all">
<h1>Таны дуртай кинонууд</h1>

<?php foreach($pager->getResults() as $rs_love):?>
    <?php $rs = ItemTable::getInstance()->doFetchOne('type, route, folder, image, title, year', array('id'=>$rs_love->get('object_id')));?>
  	<?php if($rs) include_partial('page/box-xs', array('rs'=>$rs));	?>
<?php endforeach;?>

<br clear="all">
<br clear="all">
<?php echo pager($pager, 'user/profile')?>

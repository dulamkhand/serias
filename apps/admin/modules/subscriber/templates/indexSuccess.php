<form action="<?php echo url_for('subscriber/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
	    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
	      <td><?php echo ++$i?></td>
	      <td><?php echo $rs?></td>
	      <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
	      <td nowrap width="20%">
	          <?php include_partial('partial/isActive', array('module'=>'subscriber', 'rs'=>$rs));?>
	          <?php include_partial('partial/edit', array('module'=>'subscriber', 'id'=>$rs->getId()));?>
	      </td>
	    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'subscriber/index?s='.$sf_params->get('s'))?>
<form action="<?php echo url_for('user/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Avator</th>
      <th>Fullname</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Last logged at</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
		<?php $i=0; foreach ($pager->getResults() as $rs): ?>
	    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
		      <td><?php echo ++$i?></td>
		      <td><?php echo image_tag('/u/user/100t-'.$rs->getAvator(), array()) ?></td>
		      <td><?php echo $rs ?></td>
		      <td><?php echo $rs->getEmail() ?></td>
		      <td><?php echo $rs->getMobile() ?></td>
		      <td nowrap><?php echo $rs->getLoggedAt() ?></td>
		      <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
		      <td nowrap width="20%">
		          <?php include_partial('partial/isActive', array('module'=>'user', 'rs'=>$rs));?>
		          <?php include_partial('partial/edit', array('module'=>'user', 'id'=>$rs->getId()));?>
		      </td>
	    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'user/index?s='.$sf_params->get('s'))?>
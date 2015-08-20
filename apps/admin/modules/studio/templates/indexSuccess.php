<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('studio/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Logo</th>
      <th>Name</th>
      <th>About</th>
      <th>Location</th>
      <th>Founded at</th>
      <th>Nb of views</th>
      <th>Is?</th>
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
        <td><?php echo image_tag('/u/studio/'.$rs->getImage(), array('style'=>'max-width:300px;max-height:150px;')); ?></td>
        <td><?php echo $rs?></td>
        <td><?php echo $rs->getAbout()?></td>
        <td><?php echo $rs->getLocation()?></td>
        <td><?php echo $rs->getBirthday().' - '.$rs->getDeadday()?></td>
        <td><?php echo $rs->getNbViews()?></td>
        <?php include_partial('partial/activeFeatured', array('rs'=>$rs))?>
        <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs))?>
        <td nowrap>
            <?php include_partial('partial/isActive', array('module'=>'studio', 'rs'=>$rs));?>
            <?php include_partial('partial/editDelete', array('module'=>'studio', 'id'=>$rs->getId()));?>
        </td>
      </tr>
    <?php endforeach; ?>
	</tbody>
</table>
<?php echo pager($pager, 'studio/index?s='.$sf_params->get('s'))?>
<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('celebrity/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Image</th>
      <th>Fullname</th>
      <th>Profession</th>
      <th>Birthday</th>
      <th>About</th>
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
        <td><?php echo image_tag('/u/celebrity/'.$rs->getImage(), array('style'=>'max-width:300px;max-height:150px;')); ?></td>
        <td><?php echo $rs?></td>
        <td><?php echo $rs->getProfession()?></td>
        <td><?php echo $rs->getBirthday()?></td>
        <td><?php echo $rs->getAbout()?></td>
        <td><?php echo $rs->getNbViews()?></td>
        <?php include_partial('partial/td_active_featured', array('rs'=>$rs))?>
        <?php include_partial('partial/td_sort_date_admin', array('rs'=>$rs))?>
        <td nowrap>
            <?php include_partial('partial/isActive', array('module'=>'celebrity', 'rs'=>$rs));?>
            <?php include_partial('partial/editDelete', array('module'=>'celebrity', 'id'=>$rs->getId()));?>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr><td colspan="10"><?php echo pager($pager, 'celebrity/index')?></td></tr>
  </tbody>
</table>

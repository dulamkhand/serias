<form action="<?php echo url_for('page/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Image</th>
      <th>Intro</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
      <?php $id = $rs->getId()?>
      <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('page/edit?id='.$id)?>" title="Edit" class="action">
                <?php echo $rs ?>
            </a>
        </td>
        <td>
            <?php if($rs->getImage()) echo image_tag('/u/page/'.$rs->getImage(), array('style'=>'max-width:300px;max-height:400px;')) ?>
        </td>
        <td><?php echo $rs->getIntro()?></td>
        <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
        <td nowrap width="20%">
            <?php include_partial('partial/isActive', array('module'=>'page', 'rs'=>$rs));?>
            <?php include_partial('partial/edit', array('module'=>'page', 'id'=>$rs->getId()));?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'page/index?s='.$sf_params->get('s'))?>
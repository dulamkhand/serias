<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('item/index')?>" method="GET">
    <b>Type</b>&nbsp;
    <?php $types = GlobalLib::getArray('type_mn')?>
    <select name="type" style="width:100px;">
        <option value="">Бүгд</option>
        <?php foreach ($types as $k=>$v):?>
            <option value="<?php echo $k?>" <?php if($k == $sf_params->get('type')) echo 'selected'?>>
                <?php echo $v?>
            </option>
        <?php endforeach?>
    </select>
    &nbsp; 
	<b>Admin</b>&nbsp;
    <select name="caid" style="width:100px;">
        <option value="">Бүгд</option>
        <option value="1" <?php if(1 == $sf_params->get('caid')) echo 'selected'?>>handaa.1224@gmail.com</option>
        <option value="13" <?php if(13 == $sf_params->get('caid')) echo 'selected'?>>batsukhd.mn@gmail.com</option>
        <option value="2"  <?php if(2 == $sf_params->get('caid')) echo 'selected'?>>duuya2012@gmail.com</option>
        <option value="14" <?php if(14 == $sf_params->get('caid')) echo 'selected'?>>romance0333@yahoo.com</option>
        <option value="15" <?php if(15 == $sf_params->get('caid')) echo 'selected'?>>ddairiimaa@yahoo.com</option>
    </select>
    &nbsp;
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<?php echo pager($pager, 'item/index?type='.$sf_params->get('type').'&s='.$sf_params->get('s').'&caid='.$sf_params->get('caid'))?>
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th></th>
      <th>Nb of views</th>
      <th>Is?</th>
      <th>Sort</th>
      <th>Date</th>
      <th>Admin</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('item/edit?id='.$rs->getId())?>">
               <?php if($rs->getImage()) echo image_tag('/u/'.$rs->getFolder().'/t140-'.$rs->getImage(), array('style'=>'max-width:140px;border:2px solid '.(GlobalLib::getValue('colors', $rs->getType()))))?>
            </a>
        </td>
        <td>
            <a href="<?php echo url_for('item/edit?id='.$rs->getId())?>" class="action">
            		<b><?php echo $rs ?></b><br>
            		<?php echo $rs->getSummaryMn() ? $rs->getSummaryMn() : $rs->getSummary() ?>
            </a>
        </td>
        <td><?php echo $rs->getNbViews()?></td>
        <?php include_partial('partial/td_active_featured', array('rs'=>$rs))?>
        <?php include_partial('partial/td_sort_date_admin', array('rs'=>$rs))?>
        <td nowrap>
            <a href="<?php echo url_for('image/new?objectType=item&objectId='.$rs->getId())?>" title="Images" class="action">Images (<?php echo $rs->getNbImages()?>)</a>
            <br clear="all">
            <a href="<?php echo url_for('link/index?itemId='.$rs->getId())?>" title="Links" class="action">Links</a> | 
            <a href="<?php echo url_for('link/new?itemId='.$rs->getId())?>" title="Add link" class="action">Add link</a>
            <br clear="all">
            <?php include_partial('partial/edit', array('module'=>'item', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'item/index?type='.$sf_params->get('type').'&s='.$sf_params->get('s').'&caid='.$sf_params->get('caid'))?>
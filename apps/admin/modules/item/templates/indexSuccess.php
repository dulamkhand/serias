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
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('item/edit?id='.$rs->getId())?>">
               <?php if($rs->getImage()) echo image_tag('/u/m/t140-'.$rs->getImage(), array('style'=>'max-width:140px;border:2px solid '.(GlobalLib::getValue('colors', $rs->getType()))))?>
            </a>
        </td>
        <td>
            <a href="<?php echo url_for('item/edit?id='.$rs->getId())?>" class="action">
            		<b><?php echo $rs ?></b><br>
            		<?php echo $rs->getSummaryMn() ? $rs->getSummaryMn() : $rs->getSummary() ?>
            </a>
        </td>
        <td nowrap>
            <b>View: </b><?php echo $rs->getNbViews() ?><br/>
            <b>Sort: </b><?php echo $rs->getSort() ?><br/>
            <b>Created: </b><?php echo time_ago($rs->getCreatedAt()) ?><br/>
            <b>Updated: </b><?php echo time_ago($rs->getUpdatedAt()) ?><br>
            <b>Active: </b><?php if($rs->getIsActive()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?><br>
            <b>Featured: </b><?php if($rs->getIsFeatured()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?>
        </td>
        <td nowrap>
            <?php include_partial('partial/edit', array('module'=>'item', 'id'=>$rs->getId()));?><br>
            <a href="<?php echo url_for('link/index?itemId='.$rs->getId())?>" title="Links" class="action">Links</a> | 
            <a href="<?php echo url_for('link/new?itemId='.$rs->getId())?>" title="Add link" class="action">Add link</a>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'item/index?type='.$sf_params->get('type').'&s='.$sf_params->get('s'))?>
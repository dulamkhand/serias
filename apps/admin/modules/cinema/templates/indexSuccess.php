<form action="<?php echo url_for('cinema/index')?>" method="GET">
	<b>Cinema</b>&nbsp;
    <?php $rss = GlobalLib::getArray('cinema')?>
    <select name="cinema" style="width:200px;">
        <option value="">Бүгд</option>
        <?php foreach ($rss as $k=>$v):?>
            <option value="<?php echo $k?>" <?php if($k == $sf_params->get('cinema')) echo 'selected'?>>
                <?php echo $v?>
            </option>
        <?php endforeach?>
    </select>
    &nbsp;
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Cinema</th>      
      <th>Details</th>
      <th>Item</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="<?php if(!$rs->getIsActive()) echo 'background:#cdcdcd;'?>">
      <td><?php echo ++$i?></td>
      <td nowrap><a href="<?php echo url_for('cinema/edit?id='.$rs->getId())?>">
          <?php echo GlobalLib::getValue('cinema', $rs->getCinema()) ?></a>
      </td>
      <td nowrap><a href="<?php echo url_for('cinema/edit?id='.$rs->getId())?>"><?php echo $rs->getDetails() ?></a></td>
      <td><a href="<?php echo url_for('item/edit?id='.$rs->getItem()->getId())?>" target="_blank"><?php echo $rs->getItem() ?></a></td>
      <td nowrap>
          <?php include_partial('partial/editDelete', array('module'=>'cinema', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'cinema/index?s='.$sf_params->get('s'))?>
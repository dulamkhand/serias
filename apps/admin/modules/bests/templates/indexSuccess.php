<form action="<?php echo url_for('bests/index')?>" method="GET">
		<b>Type</b>&nbsp;
    <?php $rss = GlobalLib::getArray('bests')?>
    <select name="best_type">
        <option value="">Бүгд</option>
        <?php foreach ($rss as $k=>$v):?>
            <option value="<?php echo $k?>" <?php if($k == $sf_params->get('best_type')) echo 'selected'?>>
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
      <th>Bests</th>      
      <th>Number</th>
      <th>Item</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td nowrap><a href="<?php echo url_for('bests/edit?id='.$rs->getId())?>"><?php echo $rs->getId() ?></a></td>
      <td nowrap><a href="<?php echo url_for('bests/edit?id='.$rs->getId())?>"><?php echo $rs->getNumber() ?></a></td>
      <td><?php echo $rs->getItem() ?></td>
      <td nowrap>
          <?php include_partial('partial/editDelete', array('module'=>'bests', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'bests/index')?>
<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('poll/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Poll</th>
      <th>Details</th>
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
        <td>
            <a href="<?php echo url_for('poll/edit?id='.$rs->getId())?>" class="action"><b><?php echo $rs->getTitle() ?></b></a><br>
            <?php echo $rs->getBody() ?>
        </td>
        <td nowrap>
            <?php if($rs->getMultipleChoice()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Multiple choices<br>
            <?php if($rs->getOptionsAddable()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Options addable
        </td>
        <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
        <td nowrap width="20%">
        		<a href="<?php echo url_for('pollOption/index?pollId='.$rs->getId())?>" class="action">Options</a> | 
            <a href="<?php echo url_for('pollOption/new?pollId='.$rs->getId())?>" class="action">Add option</a>
            <br clear="all">
            <?php include_partial('partial/isActive', array('module'=>'poll', 'rs'=>$rs));?>
            <?php include_partial('partial/edit', array('module'=>'poll', 'id'=>$rs->getId()));?>
        </td>
	    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'poll/index?s='.$sf_params->get('s'))?>
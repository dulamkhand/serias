<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('news/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>News</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('news/edit?id='.$rs->getId())?>" class="action"><b><?php echo $rs->getTitle() ?></b></a><br>
            <?php echo $rs->getSummary() ?>            
        </td>
        <td>
            <b>View: </b><?php echo $rs->getNbViews() ?><br/>
            <b>Sort: </b><?php echo $rs->getSort() ?><br/>
            <b>Created: </b><?php echo $rs->getCreatedAt() ?><br/>
            <b>Updated: </b><?php echo $rs->getUpdatedAt() ?>
        </td>
        <td nowrap>
            <?php include_partial('partial/actions', array('module'=>'news', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'news/index?s='.$sf_params->get('s'))?>
<form action="<?php echo url_for('news/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>News</th>
      <th>Nb of views</th>
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
	            <a href="<?php echo url_for('news/edit?id='.$rs->getId())?>" class="action"><b><?php echo $rs->getTitle() ?></b></a><br>
	            <?php if($rs->getImage()) echo image_tag('/u/news/'.$rs->getImage(), array('style'=>'max-width:200px;max-height:200px;float:left;margin:0 5px 0 0;')) ?>
	            <?php echo $rs->getIntro() ?>            
	        </td>
	        <td><?php echo $rs->getNbViews() ?></td>
	        <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
	        <td nowrap width="20%">
	            <?php include_partial('partial/isActive', array('module'=>'news', 'rs'=>$rs));?>
	            <?php include_partial('partial/edit', array('module'=>'news', 'id'=>$rs->getId()));?>
	        </td>
	    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'news/index?s='.$sf_params->get('s'))?>
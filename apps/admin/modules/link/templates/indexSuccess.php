<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('link/index')?>" method="GET">
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Link</th>
      <th>SE</th>
      <th>Details</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('link/edit?id='.$rs->getId())?>">
               <?php echo ($s->getLink())?>
            </a>
        </td>
        <td><?php echo $rs->getSeasonEpisode()?></td>
        <td>
            <b>View: </b><?php echo $rs->getNbViews() ?><br/>
            <b>Sort: </b><?php echo $rs->getSort() ?><br/>
            <b>Created: </b><?php echo time_ago($rs->getCreatedAt())?><br/>
            <b>Updated: </b><?php echo time_ago($rs->getUpdatedAt()) ?><br>
            <b>Active: </b><?php if($rs->getIsActive()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?><br>
            <b>Featured: </b><?php if($rs->getIsFeatured()) echo image_tag('icons/ok.png', array('align'=>'absmiddle')) ?>
        </td>
        <td nowrap>
            <?php include_partial('partial/editDelete', array('module'=>'link', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'link/index?s='.$sf_params->get('s'))?>
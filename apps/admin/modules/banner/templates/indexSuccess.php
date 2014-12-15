<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('banner/index')?>" method="GET">
    <?php $positions = GlobalLib::getArray('banner_position');?>
    <b>Position</b>&nbsp;
    <select name="position" id="position" style="width:250px;">
    <?php foreach ($positions as $key=>$value){
        echo '<option value="'.$key.'" '.(($position == $key) ? 'selected' : '').'>'.$value.'</option>';
    }?>
    </select> &nbsp; 
    <?php include_partial('partial/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>File</th>
      <th>Link</th>
      <th>Position</th>
      <th>Start/End</th>
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
      <td>
        <?php if($rs->getExt() =='swf'){ ?>
          <object width="300" height="150" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
            <param value="<?php echo $host.'/u/b/'.$rs->getPath()?>" name="movie">
            <param value="high" name="quality">
            <param name="wmode" value="transparent">
            <embed width="300" height="150" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" 
  								quality="high" src="<?php echo $host.'/u/b/'.$rs->getPath()?>" allowscriptaccess="sameDomain" wmode="transparent" />
          </object>
        <?php } else echo image_tag('/u/b/'.$rs->getPath(), array('style'=>'max-width:300px;max-height:150px;')); ?>
      </td>
      <td>
        <a href="<?php echo $rs->getLink() ? $rs->getLink() : '#'?>" target="<?php echo $rs->getTarget() ? '_blank' : '_parent'?>">
          <?php echo $rs->getLink();?>
        </a>
        <?php if($rs->getTarget()) echo '[Шинэ таб дээр нээгдэнэ]'?></td>
      <td nowrap><?php echo Globallib::getValue('banner_position', $rs->getPosition()) ?></td>
      <td nowrap>
          Start date: <?php echo $rs->getStartDate() ?><br/>
          End date: <?php echo $rs->getEndDate() ?>
      </td>
      <?php include_partial('partial/sortDateAdmin', array('rs'=>$rs));?>
      <td nowrap width="20%">
          <?php include_partial('partial/isActive', array('module'=>'banner', 'rs'=>$rs));?>
          <?php include_partial('partial/editDelete', array('module'=>'banner', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'banner/index?position='.$sf_params->get('position'))?></td></tr>
  </tbody>
</table>

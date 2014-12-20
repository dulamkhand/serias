<?php $host = sfConfig::get('app_host')?>
<br clear="all">
<!--breadcrumb-->
<?php $type = $rs->getType();?>
<a href="<?php echo url_for('page/index?type='.$type)?>" class="h3">
    <?php echo GlobalLib::getValue('type_mn', $type)?>
</a> &raquo;
<?php $ks = explode(";", $rs->getGenre()); $i=0?>
<?php foreach ($ks as $k):?>
		<a href="<?php echo url_for('page/index?type='.$type.'&g='.$k)?>" class="h3">
				<?php echo $k?><?php echo ++$i == sizeof($ks) ? '' : ',';?>
		</a>
<?php endforeach?>
<br clear="all">

<h2 style="font-weight:bold;color:#222;"><?php echo $rs?> (<?php echo $rs->getTitleMn()?>)</h2>
<div style="float:left;margin:0 0 20px 0;width:215px;position:relative;">
    <?php echo image_tag('/u/'.$rs->getFolder().'/'.$rs->getImage(), array('style'=>'max-width:215px;'))?>
</div>

<div class="left ml10px" style="background:#fef7cd;width:504px;padding:10px;border-radius:3px;">
		<div class="left" style="width:115px;"><?php echo $rs->getRating();?></div>
		<div class="left" style="margin:5px 0 0 0;">
				<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(), 'title'=>$rs));?>
		</div>

    <!--love-->
    <?php $isLoved = GlobalTable::doFetchOne('Love', array('id'), array('objectType'=>'item', 'objectId'=>$rs->getId(), 'isActive'=>-1));?>
    <?php echo image_tag('icons/'.( $isLoved ? 'love24.ico' : 'unlove24.ico'), 
              array('alt'=>($isLoved ? 'Unlove!' : 'Love!'),
              'onclick'=>$sf_user->isAuthenticated() ? 
                      "love({$rs->getId()}, 24);" 
                    : "$('#formLogin').dialog({height:310, width:400});", 
              'style'=>'float:left;margin:9px 0 0 20px;z-index:1;cursor:pointer;', 
              'class'=>'love24', 'id'=>'love'.$rs->getId()))?>

    <?php include_partial('love/js', array());?>
		<br clear="all">
    <?php include_partial('page/info', array('rs'=>$rs))?>
    <?php if($tmp = $rs->getBodyMn()):?>
    <div style="text-align:justify;">
        <h2 style="font-weight:bold;color:#222;">Үйл явдал</h2>
        <?php echo $tmp;?>
    </div>
    <br clear="all">
		<br clear="all">
<?php endif?>
</div>
<br clear="all">

<!--photos-->
<div>
    <?php $images = GlobalTable::doFetchArray('Image', array('folder', 'filename'), array('isActive'=>'all', 'objectType'=>'item', 'objectId'=>$rs->getId()))?>
    <?php foreach ($images as $image) {?>
        <div class="left" style="width:120px;height:80px;margin:0 5px 5px 0;overflow:hidden;">
            <?php echo image_tag('/u/'.$image['folder'].'/t120-'.$image['filename'], array('style'=>'max-width:120px;max-height:80px;'));?><br>
        </div>
    <?php }?>
</div>

<!--trailer -->
<?php echo $rs->getTrailer();?>


<!--links-->
<?php include_partial('links', array('rs'=>$rs));?>
<br clear="all">

<!--similars-->
<?php include_partial('similars', array('rs'=>$rs));?>
<br clear="all">

<div class="fb-comments" data-href="<?php echo $host."/page/show?route=".$rs->getRoute()?>" data-numposts="10" data-colorscheme="light" data-width="560"></div>
<br clear="all">
<br clear="all">


<script type="text/javascript">
function iframe(link)
{
  $.ajax({
    url: "<?php echo url_for('page/iframe')?>", 
    type: "POST",
    data: {link:link},
    beforeSend: function(){
      $('#loading').show();
    },
    success: function(data)        
    {
      $('#loading').hide();
      $("#iframe").html(data);
    }
  });
  return false;
}
</script>

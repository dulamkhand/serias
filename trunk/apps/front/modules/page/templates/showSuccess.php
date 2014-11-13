<?php $host = sfConfig::get('app_host')?>

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

<!--image & info-->
<?php $color = GlobalLib::getValue('colors', $type) ?>
<div class="box-home" style="background:<?php echo $color?>;">
		<div style="float:left;margin:0 0 10px 0;width:215px;">
				<h2 style="margin:0;"><?php echo $rs?></h2>
		    (<b><?php echo $rs->getTitleMn()?></b>)
		    <br clear="all">
		    <?php echo image_tag('/u/m/'.$rs->getImage(), array('style'=>'max-width:215px;'))?>
		</div>
    <div class="left ml10px" style="color:#fff;width:575px;">    		
    		<div class="left" style="width:125px;">
					<?php echo $rs->getRating();?>
				</div>
    		<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(),
                                       'via'=>sfConfig::get('app_webname'), 'text'=>$rs));?>
        <?php $loved = in_array($rs['id'], $loves)?>
        <?php echo image_tag('icons/'.( $loved ? 'love.ico' : 'unlove.ico'), 
              array('alt'=>($loved ? 'Unlove!' : 'Love!'),
                    'onclick'=>"love({$rs['id']}, '".($loved ? 'unlove' : 'love')."');", 
                    'style'=>'float:left;cursor:pointer;', 'class'=>'love'))?>
        <?php include_partial('user/love', array());?>
				<br clear="all">
        <?php include_partial('page/info', array('rs'=>$rs))?>
    </div>
</div>
<br clear="all">

<!--trailer & body-->
<?php echo $rs->getTrailer();?>
<?php if($tmp = $rs->getBodyMn()):?>
    <div class="right" style="width:250px;text-align:justify;">
        <h2 style="color:<?php echo $color?>;font-weight:bold;">Үйл явдал</h2>
        <?php echo $tmp;?>
    </div>
    <br clear="all">
		<br clear="all">
<?php endif?>

<!--links-->
<?php include_partial('links', array('rs'=>$rs));?>
<br clear="all">

<!--share-->
<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(), 'via'=>sfConfig::get('app_webname'), 'text'=>$rs));?>
<br clear="all">
<div class="fb-comments" data-href="<?php echo $host."/page/show?route=".$rs->getRoute()?>" data-numposts="10" data-colorscheme="light" data-width="560"></div>
<br clear="all">
<br clear="all">
<br clear="all">
<br clear="all">

<!--similars-->
<?php include_partial('similars', array('rs'=>$rs));?>

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
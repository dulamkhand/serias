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
    <!-- image & title -->
		<div style="float:left;margin:0 0 10px 0;width:215px;position:relative;">
				<h2 style="margin:0;"><?php echo $rs?></h2>
		    (<b><?php echo $rs->getTitleMn()?></b>)
		    <br clear="all">
		    <?php echo image_tag('/u/'.$rs->getFolder().'/'.$rs->getImage(), array('style'=>'max-width:215px;'))?>
		</div>
		
    <div class="left ml10px" style="color:#fff;width:510px;">
    		<div class="left" style="width:125px;">
					<?php echo $rs->getRating();?>
				</div>
				<!--share-->
    		<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(),
                                       'via'=>sfConfig::get('app_webname'), 'text'=>$rs));?>
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

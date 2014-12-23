<?php $host = sfConfig::get('app_host')?>
<!--title-->
<div>
    <span class="left h1" style="margin:0;"><?php echo $rs?> /<?php echo $rs->getTitleMn()?>/</span>
    <!--love-->
    <?php $isLoved = GlobalTable::doFetchOne('Love', array('id'), array('objectType'=>'item', 'objectId'=>$rs->getId(), 'isActive'=>-1));?>
    <?php echo image_tag('icons/'.( $isLoved ? 'love24.ico' : 'unlove24.ico'), 
              array('alt'=>($isLoved ? 'Unlove!' : 'Love!'),
              'onclick'=>$sf_user->isAuthenticated() ? 
                      "love({$rs->getId()}, 24);" 
                    : "$('#formLogin').dialog({height:310, width:400});", 
              'style'=>'margin:5px 0 0 5px;z-index:1;cursor:pointer;float:left;', 
              'class'=>'love24', 'id'=>'love'.$rs->getId()))?>
    <?php include_partial('love/js', array());?>
    <br clear="all">
</div>

<!--image-->
<div style="float:left;margin:0 0 20px 0;width:215px;position:relative;">
    <?php echo image_tag('/u/'.$rs->getFolder().'/'.$rs->getImage(), array('style'=>'max-width:215px;'))?>
    <!--info-->
    <?php include_partial('page/info', array('rs'=>$rs))?>
</div>

<div class="left" style="background:#fff6e4;width:510px;padding:5px 10px;border-radius:3px;">
		<h6 style="color:#ff6600;font-weight:bold;"><?php echo $rs->getAge();?>+</h6>
		<h6 class="right" style="margin:0 0 0 10px;width:70px;text-align:right;">
				<?php echo image_tag('icons/time.ico', array('class'=>'left', 'style'=>'margin:3px 0 0 0;'))?>
				<?php echo $rs->getDuration();?><span class="lower">min</span>
		</h6>
		<h6 class="right">
				Нээлт хийсэн: <span style="font-size:22px;"><?php echo $rs->getReleaseDate()?></span>
		</h6>
		<br clear="all">

		<!--summary-->
		<?php echo $rs->getSummaryMn();?>
		<br clear="all">
		
		<!--mmdb rating-->
		<div class="left" style="margin:15px 0 0 0;">
				<?php include_partial('page/rating', array('id'=>$rs->getId()));?>
		</div>
		<!--imdb rating-->
		<div class="left" style="margin:15px 0 0 60px;width:115px;"><?php echo $rs->getRating();?></div>
		<br clear="all">
		
		<!--genres-->
		<?php $type = $rs->getType();?>
		<?php $ks = explode(";", $rs->getGenre()); $i=0?>
		<?php foreach ($ks as $k):?>
			<a href="<?php echo url_for('page/index?type='.$type.'&g='.$k)?>" class="italic">
					<?php echo GlobalLib::getValue('genre_mn', $k)?><?php echo ++$i == sizeof($ks) ? '' : '/';?>
			</a>
		<?php endforeach?>
		<br clear="all">
		<br clear="all">
		
		<!--photos-->
		<h6 style="width:45px;">Зураг</h6>
		<hr class="left" style="border:0;border-top:1px double #aaa;width:460px;margin:14px 0 0 0;">
		<br clear="all">
		<?php $images = GlobalTable::doFetchArray('Image', array('folder', 'filename'), array('isActive'=>'all', 'limit'=>8, 'objectType'=>'item', 'objectId'=>$rs->getId()))?>
    <?php foreach ($images as $image) {?>
        <div class="left" style="width:100px;height:80px;margin:2px 2px 0 0;overflow:hidden;">
            <?php echo image_tag('/u/'.$image['folder'].'/t120-'.$image['filename'], array('style'=>'width:105px;height:80px;'));?>
        </div>
    <?php }?>
		<br clear="all">
		<br clear="all">
    <?php if($tmp = $rs->getBodyMn()):?>
		    <h6 style="width:90px;">Үйл явдал</h6>
				<hr class="left" style="border:0;border-top:1px double #aaa;width:420px;margin:14px 0 0 0;">
				<br clear="all">
		    <div style="text-align:justify;">
		        <?php echo $tmp;?>
		    </div>
		<?php endif?>
		
		<br clear="all">
		<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(), 'title'=>$rs));?>
		<br clear="all">
</div>
<br clear="all">

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

<?php $host = sfConfig::get('app_host')?>
<!--title-->
<div>
		<br clear="all">
    <span class="left h1"><?php echo $rs?> <?php if($rs->getTitleMn()) echo '/'.$rs->getTitleMn().'/'?></span>
    <!--love-->
    <?php $isLoved = LoveTable::getInstance()->doFetchOne(array('id'), array('objectType'=>'item', 'objectId'=>$rs->getId(), 'isActive'=>-1));?>
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
<?php if($rs->getCover()) echo image_tag('/u/'.$rs->getFolder().'/'.$rs->getCover(), array('style'=>'width:1081px;max-height:400px;')).'<br clear="all">'?>

<!--trailer -->
<div style="float:left;width:560px;">
	<?php if(strpos($rs->getTrailer(), 'iframe') > 0):?>
			<?php echo $rs->getTrailer();?>
	<?php else:?>
			<iframe width="560" height="315" src="<?php echo $rs->getTrailer();?>" frameborder="0" allowfullscreen></iframe>		
	<?php endif?>	
</div>

<div class="left" style="width:511px;padding:10px 0 10px 10px;">
		<div class="left" style="width:250px;">
				<h6>
						<?php echo image_tag('icons/clock.png', array('class'=>'left', 'style'=>'margin:7px 5px 0 0;'))?>
						<?php echo $rs->getDuration();?><span class="lower">min</span>
						<br clear="all">
						Насны ангилал: <span style="font-size:18px;"><?php echo $rs->getAge()?>+</span>
						<br clear="all">
						Нээлт хийсэн: <span style="font-size:18px;"><?php echo $rs->getReleaseDate()?></span>
				</h6>		
		</div>
		<div class="right" style="width:120px;">
				<!--rating-->
				<?php include_partial('page/rating', array('rs'=>$rs));?>
		</div>
		<br clear="all">

		<!--summary-->
		<?php if($tmp = $rs->getSummaryMn()):?>
				<?php echo $rs->getSummaryMn();?>
				<br clear="all">
		<?php endif?>
		
		<!--genres-->
		<div style="margin:15px 0 20px 0;">
				<?php $type = $rs->getType();?>
				<?php $ks = explode(";", $rs->getGenre()); $i=0?>
				<?php foreach ($ks as $k):?>
					<a href="<?php echo url_for('page/index?type='.$type.'&g='.$k)?>" class="italic" style="text-transform:uppercase;">
							<?php echo GlobalLib::getValue('genre_mn', $k)?><?php echo ++$i == sizeof($ks) ? '' : ' / ';?>
					</a>
				<?php endforeach?>
		</div>
		
		<?php //include_partial('page/photos', array('rs'=>$rs));?>
		<?php include_partial('page/share', array('url'=>$host."/page/show?route=".$rs->getRoute(), 'title'=>$rs));?>		
</div>
<br clear="all">

<!--info-->
<div style="float:left;width:560px;">
		<?php include_partial('page/info', array('rs'=>$rs))?>
</div>

<!--body-->
<div style="float:left;width:501px;background:#fff6e4;padding:10px;">
		<?php if($tmp = $rs->getBodyMn()):?>
		  <h6 style="width:70px;margin:0;">Үйл явдал</h6>
			<hr class="left" style="border:0;border-top:1px double #aaa;width:430px;margin:14px 0 0 0;">
		  <div style="text-align:justify;clear:both;">
		      <?php echo $tmp;?>
		  </div>
		<?php endif?>
</div>
<br clear="all">
<br clear="all">

<!--links-->
<?php //include_partial('links', array('rs'=>$rs));?>

<!--comments-->
<div class="fb-comments" data-href="<?php echo $host."/page/show?route=".$rs->getRoute()?>" data-numposts="10" data-colorscheme="light" data-width="1081"></div>
<br clear="all">
<br clear="all">

<!--similars-->
<?php include_partial('similars', array('rs'=>$rs));?>
<br clear="all">
<br clear="all">

<!--news-->
<div class="left" style="width:482px;">
		<h3>Холбоотой мэдээлэл</h3>
		<ul class="news-s">
				<?php $newss = NewsTable::getInstance()->doFetchArray(array('id, image, title, intro'), array('limit'=>2, 'itemId'=>$rs->getId()));
				foreach ($newss as $news){
						include_partial('partial1/news-s', array('rs'=>$news));
				}?>
		</ul>
		<!--<a href="<?php //echo url_for('partial1/newsIndex')?>" class="more1">Цааш</a>-->
</div>

<!--banner-->
<div class="left" style="width:599px;">
		<h3 style="margin-left:60px;">Биднийг дагана уу.</h3>
		<div style="border-left:1px solid #dedede;margin:0 0 0 30px;padding:0 0 0 30px;">
				<?php $rs = BannerTable::getInstance()->doFetchOne(array('path', 'ext', 'link', 'target'), array('position'=>'detail'));?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>537, 'height'=>190, 'close'=>false));?>		
		</div>
</div>
<br clear="all">
<br clear="all">

<!--viewed-->
<?php include_partial('user/viewed');?>

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

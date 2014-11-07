<?php $host = sfConfig::get('app_host')?>

<a href="<?php echo url_for('page/index?type='.$rs->getType())?>" class="h3" style="font-size:13px;color:#555;">
    <?php echo GlobalLib::getValue('type_mn', $rs->getType())?>
</a> &raquo;
<a href="<?php echo url_for('page/index?type='.$rs->getType().'&g='.$rs->getGenre())?>" class="h3" 
                                                                style="font-size:13px;color:#555;">
    <?php echo $rs->getGenre()?>
</a>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', $rs->getType()) ?>
<div class="box-home" style="background:<?php echo $color?>;">
    <h2><?php echo $rs?></h2>
    <?php echo image_tag('/u/m/'.$rs->getImage(), array('class'=>'left', 'style'=>'margin:0 0 10px 0;max-width:215px;'))?>
    <div class="left ml10px" style="color:#fff;width:575px;">
        <?php echo $rs->getSummary();?>
        <br clear="all">
		<div class="left" style="width:125px;">
			<?php echo $rs->getRating();?>
		</div>
        <?php include_partial('partial/share', array('url'=>$host."/page/show?route=".$rs->getRoute(),
                                       'via'=>sfConfig::get('app_webname'), 'text'=>$rs));?>
        <br clear="all">
        
        <span class="bold">Нээлт хийсэн:</span>
        <?php echo $rs->getReleaseDate()?>
        <br clear="all">
        <span class="bold">Бүтээгдсэн он:</span>
        <?php echo $rs->getYear().($rs->getYearEnd() != '0000' ? " - ".$rs->getYearEnd() : "");?>
        <br clear="all">
        <span class="bold">Дүрүүдэд:</span>
        <?php echo $rs->getCasts();?>
        <br clear="all">
        
        <?php if($tmp = $rs->getStudios()):?>
            <span class="bold">Бүтээсэн:</span>
            <?php echo $tmp?>
            <br clear="all">
        <?php endif?>
        
        <?php if($tmp = $rs->getDirector()):?>
            <span class="bold">Найруулагч:</span>
            <?php echo $tmp?>
            <br clear="all">
        <?php endif?>
        
        <?php if($tmp = $rs->getWriter()):?>
            <span class="bold">Зохиолч:</span>
            <?php echo $tmp?>
            <br clear="all">
        <?php endif?>
        
        <span class="bold">Үргэлжлэх хугацаа:</span>
        <?php echo $rs->getDuration();?>min
        <br clear="all">
        
        <?php if($tmp = $rs->getAge()):?>
            <span class="bold">Насны ангилал:</span>
            <?php echo $tmp?>+
            <br clear="all">
        <?php endif?>
        
        <?php if($tmp = $rs->getNbSeasons()):?>
            <span class="bold">Анги:</span>
            <?php echo $tmp?> seasons, <?php echo $rs->getNbEpisodes();?> episodes
            <br clear="all">
        <?php endif?>
        
        <?php if($tmp = $rs->getBoxoffice()):?>
            <span class="bold">Boxoffice:</span>
            <?php echo $tmp?>
            <br clear="all">    
        <?php endif?>
        
        <span class="bold">Албан ёсны хуудас:</span>
        <a href="<?php echo $rs->getOfficialLink1();?>" target="_blank" style="color:#fff;">Facebok official</a>, 
        <a href="<?php echo $rs->getOfficialLink2();?>" target="_blank" style="color:#fff;">Official website</a>
        <br clear="all">
        
        <?php if($tmp = $rs->getSource()):?>
            <span class="bold">Эх сурвалж:</span>
            <?php echo $tmp?>
            <br clear="all">    
        <?php endif?>
        
        <?php if($tmp = $rs->getNbViews()):?>
            <span class="bold">Үзсэн:</span>
            <?php echo $tmp?> удаа
            <br clear="all">    
        <?php endif?>
    </div>
</div>

<br clear="all">
<?php echo $rs->getTrailer();?>
<?php if($tmp = $rs->getBody()):?>
    <div class="right" style="width:250px;text-align:justify;">
        <h2 style="color:<?php echo $color?>;font-weight:bold;">Үйл явдал</h2>
        <?php echo $tmp;?>
    </div>
<?php endif?>
<br clear="all">
<br clear="all">

<?php include_partial('links', array('rs'=>$rs));?>

<br clear="all">
<br clear="all">

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

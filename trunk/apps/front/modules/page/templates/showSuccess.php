<?php $host = sfConfig::get('app_host')?>

<a href="#" class="h3" style="font-size:13px;color:#555;"><?php echo GlobalLib::getValue('type_mn', $rs->getType())?></a> &raquo;
<a href="#" class="h3" style="font-size:13px;color:#555;"><?php echo $rs->getGenre()?></a>
<br clear="all">

<?php $color = GlobalLib::getValue('colors', $rs->getType()) ?>
<div class="box-home" style="background:<?php echo $color?>;">
    <h2><?php echo $rs?></h2>
    <?php echo image_tag('/u/m/'.$rs->getImage(), array('class'=>'left', 'style'=>'margin:0 0 10px 0;'))?>
    <div class="left ml10px" style="color:#fff;width:575px;">
        <?php echo $rs->getSummary();?>
        <br clear="all">
        <?php echo $rs->getRating();?>
        <br clear="all">
        <b>Year:</b>
        <?php echo $rs->getYear();?>        
        <br clear="all">
        <b>Director:</b>
        <?php echo $rs->getDirector();?>
        <br clear="all">
        <b>Writer:</b>
        <?php echo $rs->getWriter();?>
        <br clear="all">
        <b>Duration:</b>
        <?php echo $rs->getDuration();?>min
        <br clear="all">
        <?php echo $rs->getBody();?>
    </div>    
</div>
<br clear="all">
    <?php echo $rs->getTrailer();?>
<br clear="all">
<br clear="all">
<div class="box-home" style="background:#dedede;border:1px solid #ccc;">
    <?php $links = Doctrine::getTable('Link')->createQuery()
                      ->where('item_id =?', $rs->getId())
                      ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
                      ->execute();?>
    <?php if(!sizeof($links)):?>
        Линк оруулаагүй байна. Та хэсэг хугацааны дараа дахин хандаарай.
    <?php endif?>

    <?php $season=null; $episode=null; $l=0; $first=0;?>
    <?php foreach($links as $link):?>
        <!--series-->
        <?php if($rs->getType() == 'series'):?>
            <!--season endline-->
            <?php if($season != $link->getSeason()):?>
                <?php if($first != 0) echo '<br clear="all">'?>
                <hr style="border:0;border:2px solid #fff;margin:20px 0;">
                <?php $season = $link->getSeason(); $first = 0;?>
            <?php endif?>
            
            <!--title-->
            <?php if($episode != $link->getEpisode()):?>
                <?php if($first++ != 0) echo '<br clear="all"><br clear="all">'?>
                <h2 style="color:<?php echo $color?>">
                    <?php echo $link?>
                </h2>
                <?php $l=0; $episode = $link->getEpisode();?>
            <?php endif?>
        <?php endif?>
        <!--links-->
        <h3 onclick="iframe('<?php echo $link->getLink()?>')" class="left">
             линк<?php echo ++$l?>
        </h3>
    <?php endforeach;?>

    <br clear="all">
    <?php echo image_tag('http://www.utah.gov/transparency/images/icons/loading_large.gif', array('style'=>'margin:0 auto;display:none;', 'id'=>'loading'))?>

    <div id="iframe"></div>
</div>


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

<div class="box-home" style="background:#dedede;border:1px solid #ccc;">
    <?php $links = Doctrine::getTable('Link')->createQuery()
                      ->where('item_id =?', $rs->getId())
                      ->orderBy('season ASC, episode ASC, created_at DESC, updated_at DESC')
                      ->execute();?>
    <?php if(!sizeof($links)):?>
        Линк оруулаагүй байна. Та хэсэг хугацааны дараа дахин хандаарай.
    <?php endif?>
    
    <?php 
    $season=null; $episode=null;
    $nbSeasons = 0; $nbEpisodes = 0;
    foreach($links as $link) {
        if($season != $link->getSeason()) {
            $season = $link->getSeason();
            $nbSeasons++;
        }
        if($episode != $link->getEpisode()) {
            $episode = $link->getEpisode();
            $nbEpisodes++;
        }
    }?>
    Season: <?php echo $nbSeasons?>, 
    Episode: <?php echo $nbEpisodes?>

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
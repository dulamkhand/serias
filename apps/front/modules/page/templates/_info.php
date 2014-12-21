<?php echo $rs->getSummaryMn();?>
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
<h3><?php echo $page?></h3>

<?php echo GlobalLib::clearOutput($page->getIntro())?>
<br clear="all">
<br clear="all">
<hr style="border:0;border-top:2px dotted #ededed;">
<br clear="all">
<?php echo GlobalLib::clearOutput($page->getContent())?>
<br clear="all">
<br clear="all">
<?php 
	if($page->getImage()) {
	    echo image_tag('/u/page/'.$page->getImage(), array('title'=>$page, 'alt'=>$page, 'style'=>'max-width:830px;'));
	    echo '<br clear="all">';
	}
?>

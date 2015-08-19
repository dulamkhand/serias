<h3 class="left" style="width:100%;margin:0 0 5px 0;"><?php echo $page?></h3>
<br clear="all">

<div style="background:#fff;width:830px;padding:15px 0;line-height:30px;border-top:3px double #000;">
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
</div>
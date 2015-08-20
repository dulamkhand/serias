<h3 style="color:#000;border-color:#000;">
		<?php echo $rs?>
		<div class="timestamp right">
				<?php echo time_ago($rs->getCreatedAt())?> &nbsp; | &nbsp;
				<?php echo $rs->getNbViews()?> нээгдсэн.
		</div>
</h3>
<?php if($rs->getImage()) {
    echo image_tag('/u/news/'.$rs->getImage(), array('title'=>$rs, 'alt'=>$rs, 'style'=>'float:left;margin:10px 10px 10px 0;max-width:350px;'));
}?>

<?php echo GlobalLib::clearOutput($rs->getIntro())?>
<hr style="border:0;border-top:2px dotted #ededed;margin:15px 0 10px 0;">
<?php echo GlobalLib::clearOutput($rs->getContent())?>
<br clear="all">
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=877037815640906&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header">
	<!--logo-->
	<a href="<?php echo url_for('@homepage')?>" class="left" style="margin:8px 0 0 0;">
        <?php echo image_tag('logo-200x100.png', array('style'=>'max-width:150px;'))?>
    </a>
    <!--banner-->
    <div class="left">
    		<?php $rs = ItemTable::getInstance()->doFetchOne(array('path', 'ext', 'link', 'target'), array('position'=>'top'));?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>750, 'height'=>90));?>
    </div>
	<!--bar-->
	<div id="bar">
		<?php include_partial("partial/search", array());?>		
		<?php include_partial('user/login', array())?>
	</div>
</div>

<script type="text/javascript">
		$("#bar").sticky({topSpacing:0});
</script>
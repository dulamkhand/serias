<body>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    appId      : '275326106146140',// App - Mongolian Movie Database - mmdb.llc@gmail.com
    xfbml      : true,
    version    : 'v2.6'
  });
  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	});
};

// Load the SDK asynchronously
(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div id="header">
		<!--logo-->
		<a href="<?php echo url_for('@homepage')?>" class="left" style="margin:8px 0 0 0;">
        <?php echo image_tag('logo-200x100.png', array('style'=>'max-width:150px;'))?>
    </a>
    <!--banner-->
    <div class="left">
    		<?php $rs = BannerTable::getInstance()->doFetchOne('path, ext, link, target', array('position'=>'top'));?>
				<?php include_partial("partial/banner", array('rs'=>$rs, 'width'=>931, 'height'=>90, 'close'=>false));?>
    </div>
		<!--bar-->
		<div id="bar">
			<?php include_partial("partial/search", array());?>		
			<?php include_partial('user/signHeader', array())?>
		</div>
</div>

<script type="text/javascript">
		$("#bar").sticky({topSpacing:0});
</script>
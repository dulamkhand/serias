<?php $host = sfConfig::get('app_host')?>
<head>
	  <?php include_http_metas() ?>
	  <?php include_metas() ?>
	  <?php include_title() ?>
	  <link rel="shortcut icon" href="<?php echo $host?>images/favicon.ico" />
	
	  <!-- JQUIRY -->
	  <script src="<?php echo $host?>js/jquery.min.js"></script>
	  <script src="<?php echo $host?>addons/ui/jquery-ui.min.js"></script>
	  
	  <!-- ADDONS -->    
	  <?php use_stylesheet('/addons/ui/jquery-ui.css') ?>

    <?php use_javascript('/addons/sticky/jquery.sticky.js');?>    
    <?php use_javascript('/addons/scrollup/jquery.scrollUp.min.js');?>
    
    <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>    
    <?php use_stylesheet('/addons/flexslider/flexslider.css');?>
    
    <?php use_javascript('/addons/fancybox/jquery.fancybox.pack.js');?>
    <?php use_stylesheet('/addons/fancybox/jquery.fancybox.css');?>
    
    <?php use_javascript('/addons/bar-rating/jquery.barrating.min.js');?>
		<?php use_stylesheet('/addons/bar-rating/style.css') ?>
    		
    <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
    <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
	  
		<?php include_stylesheets() ?>
	  <?php include_javascripts() ?>
	  
	  <script type="text/javascript">
		    $(function(){
		        $.scrollUp({scrollText:''});
		    });
	  </script>
</head>
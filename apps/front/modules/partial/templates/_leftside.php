<?php $host = sfConfig::get('app_host')?>
<div id="leftside">
	<?php include_partial('partial/socials', array());?>
	<br clear="all">
    <ul id="mainmenu">
		<li><a style="color:#fff;background:#bb3300;font-weight:bold;">ЦЭС</a></li>
        <?php $rss = GlobalLib::getArray('type_mn')?>
        <?php foreach ($rss as $k=>$v):?>
            <li><a href="<?php echo url_for('page/index?type='.$k)?>" class="<?php echo ($k == $sf_params->get('type')) ? 'active' : ''?>">
            		<?php echo $v?>
        		</a></li>
        <?php endforeach;?>
    </ul>
    <ul id="mainmenu">
		<li><a style="color:#fff;background:#bb3300;font-weight:bold;">ТӨРӨЛ</a></li>
        <?php $rss = GlobalLib::getArray('genre_mn')?>
        <?php foreach ($rss as $k=>$v):?>
            <li><a href="<?php echo url_for('page/index?g='.$k)?>" class="<?php echo ($k == $sf_params->get('g')) ? 'active' : ''?>">
            		<?php echo $v?>
        		</a></li>
        <?php endforeach;?>
    </ul>
	<ul id="mainmenu">
		<li><a style="color:#fff;background:#bb3300;font-weight:bold;">МЭДЭЭЛЭЛ</a></li>        
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">ЖҮЖИГЧИН</a></li>
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">НАЙРУУЛАГЧ</a></li>
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">ЗОХИОЛЧ</a></li>
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">ПРОДАКШН</a></li>
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">ТРЭЙЛЕР</a></li>
		<li><a href="<?php '#'//echo url_for('page/index?g='.$k)?>">КИНО СЭТГЭГДЭЛ</a></li>
    </ul>
  
    <!--<br clear="all">
    <div style="float:left;margin:0 20px 0 10px;" class="fb-like" data-href="<?php echo $host?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
    <div style="float:left;margin:0 0 0 10px;" class="fb-follow" data-href="<?php echo $host?>" data-layout="box_count" data-colorscheme="light" data-show-faces="false"></div>
    <a class="twitter-share-button" href="https://twitter.com/share" data-related="twitterdev" data-count="vertical" 
		 	 data-url="<?php echo $host?>" data-via="<?php echo sfConfig::get('app_webname')?>" data-text="<?php echo sfConfig::get('app_webname')?>">Tweet</a>
		<script type="text/javascript">
		window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
		</script>-->
    
</div><!--leftside-->

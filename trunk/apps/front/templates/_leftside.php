<div id="leftside">
  
  <a href="<?php echo url_for('@homepage')?>">
      <?php echo image_tag('logo.png', array('style'=>'margin:0 10px 0 20px;', 'width'=>90))?>
  </a>
  <br clear="all">
  
  <input type="text" name="search" id="search" style="width:125px;margin:10px 0;"/>
  <br clear="all">

  <ul id="mainmenu">
      <li><a href="<?php echo url_for('page/index?type=movie')?>">КИНО</a></li>
      <li><a href="<?php echo url_for('page/index?type=series')?>">ЦУВРАЛ</a></li>
      <li><a href="<?php echo url_for('page/index?type=tvshow')?>">TВ ШОУ</a></li>
      <li><a href="<?php echo url_for('page/index?type=mn')?>">МОНГОЛ КИНО</a></li>
      <li><a href="<?php echo url_for('page/index?type=nonfiction')?>">БАРИМТАТ КИНО</a></li>
  </ul>

  <br clear="all">
  <div class="fb-like" data-href="http://imdb/index.php" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>

  <br clear="all">
  <h3 style="font-size:13px;">Төрөл</h3>
  <?php foreach (GlobalLib::getArray('genre') as $k=>$v):?>
      <a href="<?php echo url_for('page/index?type=movie&g='.$k)?>"><?php echo $v?></a><br>
  <?php endforeach?>
  <br clear="all">
  <h3 style="font-size:13px;">Он</h3>
  <?php foreach (GlobalLib::getArray('years') as $k=>$v):?>
      <a href="<?php echo url_for('page/index?type=movie&y='.$k)?>"><?php echo $v?></a><br>
  <?php endforeach?>
  <br clear="all">
  
  
</div><!--leftside-->


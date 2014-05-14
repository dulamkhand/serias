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
  <br clear="all">
  <br clear="all">
  <h3>Box Office</h3>
  <ul>
    <li>
      1. 	Neighbors 	$49M<br>
      2. 	The Amazing Spider-Man 2 	$35.5M<br>
      3. 	The Other Woman 	$9.61M<br>
      4. 	Heaven Is for Real 	$7.48M<br>
      5. 	Captain America: The Winter Soldier
    </li>
  </ul>

  <br clear="all">
  <br clear="all">
  <h3>Opening</h3>
  <ul>
    <li>
      Godzilla<br>
      Million Dollar Arm<br>
      The Immigrant<br>
      Chinese Puzzle<br>
      Half of a Yellow Sun<br>
      Ai Weiwei: The Fake Case<br>
    </li>
  </ul>
  
</div><!--leftside-->

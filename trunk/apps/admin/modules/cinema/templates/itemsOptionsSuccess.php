<?php foreach ($rss as $k=>$v):?>
   <option value="<?php echo $k?>" <?php echo $itemId == $k ? 'selected' : ''?>><?php echo $v?></option>
<?php endforeach;?>
<div id="footer">
  <div class="left" style="margin:0 0 0 20px;border-right:1px solid #dedede;width:460px;">
  		<!--logo-->
			<a href="<?php echo url_for('@homepage')?>" class="left" style="margin:15px 40px 0 0;">
	        <?php echo image_tag('logo-200x100.png', array('style'=>'max-width:150px;'))?>
	    </a>
	    <!--pages-->
	    <?php $rss = PageTable::getInstance()->doFetchArray(array('type', 'title'), array('limit'=>20));?>
      <ul class="left">
      		<?php $i=0; foreach ($rss as $rs):?>
		      		<?php if($i++ < 4):?>
									<li><a href="<?php echo url_for('main/'.$rs['type'])?>">
												&raquo; &nbsp; <?php echo $rs['title']?>
									</a></li>
							<?php endif;?>
					<?php endforeach;?>
      </ul>
  </div>
  <div class="right" style="margin:0 20px 0 0;width:520px;">
  		<table>
  				<tr>
  						<td width="30%">
  								<ul>
  										<?php $i=0; foreach ($rss as $rs):?>
								      		<?php if($i++ >= 4):?>
															<li><a href="<?php echo url_for('main/'.$rs['type'])?>">
																		&raquo; &nbsp; <?php echo $rs['title']?>
															</a></li>
													<?php endif;?>
											<?php endforeach;?>
						      </ul>
  						</td>
  						<td width="35%">
  								<h2 style="text-align:center;">Join the newsletter</h2>
  						</td>
  						<td width="25%" align="center">
  								<h2 style="text-align:center;">Follow us</h2>
									<?php include_partial('partial/socials', array());?>
  						</td>
  				</tr>
  		</table>
  </div>
  <br clear="all">
</div>

<?php $rs = BannerTable::getInstance()->doFetchOne(array('path', 'ext', 'link', 'target'), array('position'=>'footer'));?>
<?php if($rs) include_partial("partial/banner", array('rs'=>$rs, 'width'=>1081, 'height'=>100, 'close'=>false));?>
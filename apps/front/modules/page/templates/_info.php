<table>
		<tr class="odd">
				<td>Дүрүүдэд:</td>
				<td><?php echo $rs->getCasts();?></td>
		</tr>
		<?php if($tmp = $rs->getStudios()):?>
				<tr>
						<td>Бүтээсэн:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getDirector()):?>
				<tr class="odd">
						<td>Найруулагч:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getWriter()):?>
				<tr>
						<td>Зохиолч:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getNbSeasons()):?>
				<tr class="odd">
						<td>Анги:</td>
						<td><?php echo $tmp?> seasons, <?php echo $rs->getNbEpisodes();?> episodes</td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getOfficialLink1()):?>
				<tr class="odd">
						<td>Facebook:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getOfficialLink2()):?>
				<tr>
						<td>Вэб:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getSource()):?>
				<tr class="odd">
						<td>Эх сурвалж:</td>
						<td><?php echo $tmp?></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getNbViews()):?>
				<tr>
						<td></td>
						<td>
								<h6 style="font-size:40px;color:#ff6600;font-weight:bold;margin:15px 0 0 10px;">
										<?php echo $tmp?>
								</h6>
						    <br clear="all">
								<span class="upper" style="color:#666;">Нээгдсэн</span>
						</td>
				</tr>		    
		<?php endif?>
		<tr>
				<td></td>
				<td></td>
		</tr>
</table>

<?php if($tmp = $rs->getBoxoffice()):?>
    <h6>Boxoffice:</h6>
    <?php echo $tmp?>
    <br clear="all">    
<?php endif?>

<style>
.odd{background:#fef7cd;}
</style>
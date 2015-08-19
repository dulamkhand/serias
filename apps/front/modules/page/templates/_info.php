<table width="100%">
		<tr class="odd">
				<td>Дүрүүдэд:</td>
				<td><?php echo $rs->getCasts();?></td>
		</tr>
		<tr>
				<td>Бүтээсэн:</td>
				<td><?php echo $rs->getStudios()?></td>
		</tr>
		<tr class="odd">
				<td>Найруулагч:</td>
				<td><?php echo $rs->getDirector()?></td>
		</tr>
		<tr>
				<td>Зохиолч:</td>
				<td><?php echo $rs->getWriter()?></td>
		</tr>
		<?php $i=1;?>
		<?php if($tmp = $rs->getOfficialLink1()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td colspan="2"><a href="<?php echo $tmp?>" target="_blank">Албан ёсны facebook хуудас</a></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getOfficialLink2()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td colspan="2"><a href="<?php echo $tmp?>" target="_blank">Албан ёсны вэб сайт</a></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getSource()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
				    <td colspan="2"><a href="<?php echo $tmp?>" target="_blank">Эх сурвалж</a></td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getBoxoffice()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td></td>
						<td>
								<span class="bold"><?php echo $tmp?> </span>
								<span class="upper" style="color:#666;">Boxoffice</span>
						</td>
				</tr>		    
		<?php endif?>
		<?php if($tmp = $rs->getBoxofficeMn()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td></td>
						<td>
								<span class="bold"><?php echo $tmp?> </span>
								<span class="upper" style="color:#666;">Boxoffice Mongolia</span>
						</td>
				</tr>		    
		<?php endif?>
		<?php if($tmp = $rs->getNbSeasons()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td>Анги:</td>
						<td><?php echo $tmp?> seasons, <?php echo $rs->getNbEpisodes();?> episodes</td>
				</tr>
		<?php endif?>
		<?php if($tmp = $rs->getNbViews()):?>
				<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
						<td></td>
						<td>
								<span class="bold"><?php echo $tmp?> </span>
								<span class="upper" style="color:#666;">Нээгдсэн</span>
						</td>
				</tr>		    
		<?php endif?>
		<tr class="<?php echo $i++%2 == 0 ? '' : 'odd'?>">
				<td></td>
				<td></td>
		</tr>
</table>

<style>
.odd{background:#efefef;}
</style>
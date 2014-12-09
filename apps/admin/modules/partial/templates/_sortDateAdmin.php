<td nowrap><?php echo $rs->getSort() ?></td>
<td nowrap>
    Created at: <?php echo time_ago($rs->getCreatedAt()) ?><br>
    Updated at: <?php echo time_ago($rs->getUpdatedAt()) ?>
</td>
<td nowrap>                            
    Created by: <?php echo $rs->getAdmin()->getUsername() ?><br>
    Updated by: <?php echo $rs->getAdmin_2()->getUsername() ?>
</td>
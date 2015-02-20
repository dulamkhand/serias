<form action="<?php echo url_for('cinema/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp; <?php echo link_to('Back to list', 'cinema/index', array()) ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
          <th><?php echo $form['cinema']->renderLabel() ?></th>
          <td>
            <?php echo $form['cinema']->renderError() ?>
            <?php echo $form['cinema'] ?>
          </td>
      </tr>      
      <tr>
          <th><?php echo $form['details']->renderLabel() ?></th>
          <td>
            <?php echo $form['details']->renderError() ?>
            <?php echo $form['details'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['item_id']->renderLabel() ?></th>
          <td>
            <?php echo $form['item_search'] ?>
            <br clear="all">
            <?php echo $form['item_id']->renderError() ?>
            <?php echo $form['item_id'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['is_active']->renderLabel() ?></th>
          <td>
            <?php echo $form['is_active']->renderError() ?>
            <?php echo $form['is_active'] ?>
          </td>
      </tr>
    </tbody>
  </table>
</form>


<script type="text/javascript">
function itemsOptions() {
  $.ajax({
      url: "<?php echo url_for('cinema/itemsOptions')?>",
      data: {s : $('#cinema_item_search').val(), itemId: <?php echo $form->getObject()->getItemId() ? $form->getObject()->getItemId() : 0?>},
      type: "POST",
      success: function(data){
          $('#cinema_item_id').html(data);
      }
  });
  return false;
}
$(document).ready(function() {
		$('#cinema_item_search').val('<?php echo $form->getObject()->getItem()->getTitle()?>');
    itemsOptions();
});
</script>
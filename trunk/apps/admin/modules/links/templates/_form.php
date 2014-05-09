<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('links/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('links/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'links/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['link']->renderLabel() ?></th>
        <td>
          <?php echo $form['link']->renderError() ?>
          <?php echo $form['link'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['season']->renderLabel() ?></th>
        <td>
          S
          <?php echo $form['season']->renderError() ?>
          <?php echo $form['season'] ?>
          E
          <?php echo $form['episode']->renderError() ?>
          <?php echo $form['episode'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
          <div class="description"><?php echo $form['sort']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_featured']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_featured']->renderError() ?>
          <?php echo $form['is_featured'] ?>
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
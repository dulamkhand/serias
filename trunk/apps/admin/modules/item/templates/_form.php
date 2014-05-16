<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('item/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="left">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('item/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'item/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['type']->renderLabel() ?></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
        </td>
      </tr>
       <tr>
        <th><?php echo $form['genre']->renderLabel() ?></th>
        <td>
          <?php echo $form['genre']->renderError() ?>
          <?php echo $form['genre'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['year']->renderLabel() ?></th>
        <td>
          <?php echo $form['year']->renderError() ?>
          <?php echo $form['year'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['summary']->renderLabel() ?></th>
        <td>
          <?php echo $form['summary']->renderError() ?>
          <?php echo $form['summary'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['body']->renderLabel() ?></th>
        <td>
          <?php echo $form['body']->renderError() ?>
          <?php echo $form['body'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trailer']->renderLabel() ?></th>
        <td>
          <?php echo $form['trailer']->renderError() ?>
          <?php echo $form['trailer'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="left">
      <tr>
        <th><?php echo $form['duration']->renderLabel() ?></th>
        <td>
          <?php echo $form['duration']->renderError() ?>
          <?php echo $form['duration'] ?>
          <?php echo $form['duration']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['director']->renderLabel() ?></th>
        <td>
          <?php echo $form['director']->renderError() ?>
          <?php echo $form['director'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['writer']->renderLabel() ?></th>
        <td>
          <?php echo $form['writer']->renderError() ?>
          <?php echo $form['writer'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
          <?php echo $form['sort']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['boxoffice']->renderLabel() ?></th>
        <td>
          <?php echo $form['boxoffice']->renderError() ?>
          <?php echo $form['boxoffice'] ?>
          <?php echo $form['boxoffice']->renderHelp() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['thisweek']->renderLabel() ?></th>
        <td>
          <?php echo $form['thisweek']->renderError() ?>
          <?php echo $form['thisweek'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comingsoon']->renderLabel() ?></th>
        <td>
          <?php echo $form['comingsoon']->renderError() ?>
          <?php echo $form['comingsoon'] ?>
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
      <tr>
        <th><?php echo $form['rating']->renderLabel() ?></th>
        <td>
          <?php echo $form['rating']->renderError() ?>
          <?php echo $form['rating'] ?>
        </td>
      </tr>
  </table>
</form>
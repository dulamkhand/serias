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
            <?php $params = $sf_params->get('genres') ? $sf_params->get('genres') : explode(";", $form->getObject()->getGenre());?>
            <?php $choices = GlobalLib::getArray('genre');?>
            <select id="item_genre" name="genres[]" style="height:300px;width:250px;" multiple="1">
                <?php foreach ($choices as $k=>$v):?>
                    <option value="<?php echo $k?>" <?php echo in_array($k, $params) ? 'selected': ''?>><?php echo $v?></option>
                <?php endforeach;?>
            </select><br>
            <?php echo $form['genre']->renderHelp() ?>
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
        <th><?php echo $form['title_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['title_mn']->renderError() ?>
          <?php echo $form['title_mn'] ?>
        </td>
      </tr>
      <tr>          
        <th><?php echo $form['year']->renderLabel() ?></th>
        <td>
          <?php echo $form['year']->renderError() ?>
          <?php echo $form['year'] ?>
          - 
          <?php echo $form['year_end']->renderError() ?>
          <?php echo $form['year_end'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['release_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['release_date']->renderError() ?>
          <?php echo $form['release_date'] ?>
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
        <th><?php echo $form['summary_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['summary_mn']->renderError() ?>
          <?php echo $form['summary_mn'] ?>
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
        <th><?php echo $form['body_mn']->renderLabel() ?></th>
        <td>
          <?php echo $form['body_mn']->renderError() ?>
          <?php echo $form['body_mn'] ?>
        </td>
      </tr>
      <tr><td colspan="2" style="color:#FF6600;"><?php echo str_repeat('-', 120)?></td></tr>
      <tr>
        <th><?php echo $form['studios']->renderLabel() ?></th>
        <td>
          <?php echo $form['studios']->renderError() ?>
          <?php echo $form['studios'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rating']->renderLabel() ?></th>
        <td>
          <?php echo $form['rating']->renderError() ?>
          <?php echo $form['rating'] ?>
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
        <th><?php echo $form['age']->renderLabel() ?></th>
        <td>
          <?php echo $form['age']->renderError() ?>
          <?php echo $form['age'] ?>
          <?php echo $form['age']->renderHelp() ?>
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
        <th><?php echo $form['casts']->renderLabel() ?></th>
        <td>
          <?php echo $form['casts']->renderError() ?>
          <?php echo $form['casts'] ?>
          <?php echo $form['casts']->renderHelp() ?>
        </td>
      </tr>
			<tr><td colspan="2" style="color:#FF6600;"><?php echo str_repeat('-', 120)?></td></tr>
      <tr>
        <th><?php echo $form['nb_seasons']->renderLabel() ?></th>
        <td>
          <?php echo $form['nb_seasons']->renderError() ?>
          <?php echo $form['nb_seasons'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nb_episodes']->renderLabel() ?></th>
        <td>
          <?php echo $form['nb_episodes']->renderError() ?>
          <?php echo $form['nb_episodes'] ?>
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
      <tr><td colspan="2" style="color:#FF6600;"><?php echo str_repeat('-', 120)?></td></tr>
      <tr>
        <th><?php echo $form['official_link1']->renderLabel() ?></th>
        <td>
          <?php echo $form['official_link1']->renderError() ?>
          <?php echo $form['official_link1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['official_link2']->renderLabel() ?></th>
        <td>
          <?php echo $form['official_link2']->renderError() ?>
          <?php echo $form['official_link2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trailer']->renderLabel() ?></th>
        <td>
          <?php echo $form['trailer']->renderError() ?>
          <?php echo $form['trailer'] ?>
        </td>
      </tr>
	  <tr><td colspan="2" style="color:#FF6600;"><?php echo str_repeat('-', 120)?></td></tr>
      <tr>
        <th><?php echo $form['kickass']->renderLabel() ?></th>
        <td>
          <?php echo $form['kickass']->renderError() ?>
          <?php echo $form['kickass'] ?>
		  <?php echo $form['kickass']->renderHelp() ?>
        </td>
      </tr>
	  <tr>
        <th><?php echo $form['torrentz']->renderLabel() ?></th>
        <td>
          <?php echo $form['torrentz']->renderError() ?>
          <?php echo $form['torrentz'] ?>
		  <?php echo $form['torrentz']->renderHelp() ?>
        </td>
      </tr>
	  <tr>
        <th><?php echo $form['extratorrent']->renderLabel() ?></th>
        <td>
          <?php echo $form['extratorrent']->renderError() ?>
          <?php echo $form['extratorrent'] ?>
		  <?php echo $form['extratorrent']->renderHelp() ?>
        </td>
      </tr>
	  <tr>
        <th><?php echo $form['freetvvideoonline']->renderLabel() ?></th>
        <td>
          <?php echo $form['freetvvideoonline']->renderError() ?>
          <?php echo $form['freetvvideoonline'] ?>
		  <?php echo $form['freetvvideoonline']->renderHelp() ?>
        </td>
      </tr>
	  <tr>
        <th><?php echo $form['youtube']->renderLabel() ?></th>
        <td>
          <?php echo $form['youtube']->renderError() ?>
          <?php echo $form['youtube'] ?>
		  <?php echo $form['youtube']->renderHelp() ?>
        </td>
      </tr>
      <tr><td colspan="2" style="color:#FF6600;"><?php echo str_repeat('-', 120)?></td></tr>
      <tr>
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
          <?php echo $form['sort']->renderHelp() ?>
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
  </table>
</form>
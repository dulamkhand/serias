<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'type'              => new sfWidgetFormInputText(),
      'genre'             => new sfWidgetFormTextarea(),
      'title'             => new sfWidgetFormTextarea(),
      'title_mn'          => new sfWidgetFormTextarea(),
      'route'             => new sfWidgetFormTextarea(),
      'folder'            => new sfWidgetFormInputText(),
      'image'             => new sfWidgetFormTextarea(),
      'year'              => new sfWidgetFormInputText(),
      'year_end'          => new sfWidgetFormInputText(),
      'summary'           => new sfWidgetFormTextarea(),
      'body'              => new sfWidgetFormTextarea(),
      'summary_mn'        => new sfWidgetFormTextarea(),
      'body_mn'           => new sfWidgetFormTextarea(),
      'trailer'           => new sfWidgetFormTextarea(),
      'rating'            => new sfWidgetFormTextarea(),
      'duration'          => new sfWidgetFormInputText(),
      'age'               => new sfWidgetFormInputText(),
      'studios'           => new sfWidgetFormTextarea(),
      'director'          => new sfWidgetFormTextarea(),
      'writer'            => new sfWidgetFormTextarea(),
      'nb_seasons'        => new sfWidgetFormInputText(),
      'nb_episodes'       => new sfWidgetFormInputText(),
      'official_link1'    => new sfWidgetFormTextarea(),
      'official_link2'    => new sfWidgetFormTextarea(),
      'release_date'      => new sfWidgetFormDate(),
      'casts'             => new sfWidgetFormTextarea(),
      'kickass'           => new sfWidgetFormTextarea(),
      'torrentz'          => new sfWidgetFormTextarea(),
      'extratorrent'      => new sfWidgetFormTextarea(),
      'freetvvideoonline' => new sfWidgetFormTextarea(),
      'youtube'           => new sfWidgetFormTextarea(),
      'sort'              => new sfWidgetFormInputText(),
      'nb_views'          => new sfWidgetFormInputText(),
      'nb_love'           => new sfWidgetFormInputText(),
      'is_active'         => new sfWidgetFormInputCheckbox(),
      'is_featured'       => new sfWidgetFormInputCheckbox(),
      'boxoffice'         => new sfWidgetFormInputCheckbox(),
      'thisweek'          => new sfWidgetFormInputCheckbox(),
      'comingsoon'        => new sfWidgetFormInputCheckbox(),
      'source'            => new sfWidgetFormTextarea(),
      'created_aid'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'              => new sfValidatorString(array('max_length' => 100)),
      'genre'             => new sfValidatorString(array('max_length' => 1000)),
      'title'             => new sfValidatorString(array('max_length' => 1000)),
      'title_mn'          => new sfValidatorString(array('max_length' => 1000)),
      'route'             => new sfValidatorString(array('max_length' => 1000)),
      'folder'            => new sfValidatorString(array('max_length' => 100)),
      'image'             => new sfValidatorString(array('max_length' => 1000)),
      'year'              => new sfValidatorInteger(),
      'year_end'          => new sfValidatorInteger(),
      'summary'           => new sfValidatorString(),
      'body'              => new sfValidatorString(),
      'summary_mn'        => new sfValidatorString(),
      'body_mn'           => new sfValidatorString(),
      'trailer'           => new sfValidatorString(),
      'rating'            => new sfValidatorString(),
      'duration'          => new sfValidatorInteger(),
      'age'               => new sfValidatorInteger(),
      'studios'           => new sfValidatorString(array('max_length' => 1000)),
      'director'          => new sfValidatorString(array('max_length' => 1000)),
      'writer'            => new sfValidatorString(array('max_length' => 1000)),
      'nb_seasons'        => new sfValidatorInteger(),
      'nb_episodes'       => new sfValidatorInteger(),
      'official_link1'    => new sfValidatorString(array('max_length' => 1000)),
      'official_link2'    => new sfValidatorString(array('max_length' => 1000)),
      'release_date'      => new sfValidatorDate(),
      'casts'             => new sfValidatorString(),
      'kickass'           => new sfValidatorString(),
      'torrentz'          => new sfValidatorString(),
      'extratorrent'      => new sfValidatorString(),
      'freetvvideoonline' => new sfValidatorString(),
      'youtube'           => new sfValidatorString(),
      'sort'              => new sfValidatorInteger(),
      'nb_views'          => new sfValidatorInteger(),
      'nb_love'           => new sfValidatorInteger(),
      'is_active'         => new sfValidatorBoolean(),
      'is_featured'       => new sfValidatorBoolean(),
      'boxoffice'         => new sfValidatorBoolean(),
      'thisweek'          => new sfValidatorBoolean(),
      'comingsoon'        => new sfValidatorBoolean(),
      'source'            => new sfValidatorString(array('max_length' => 1000)),
      'created_aid'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

}

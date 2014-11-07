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
      'id'             => new sfWidgetFormInputHidden(),
      'type'           => new sfWidgetFormInputText(),
      'genre'          => new sfWidgetFormTextarea(),
      'title'          => new sfWidgetFormTextarea(),
      'title_mn'       => new sfWidgetFormTextarea(),
      'route'          => new sfWidgetFormTextarea(),
      'image'          => new sfWidgetFormTextarea(),
      'year'           => new sfWidgetFormInputText(),
      'year_end'       => new sfWidgetFormInputText(),
      'summary'        => new sfWidgetFormTextarea(),
      'body'           => new sfWidgetFormTextarea(),
      'summary_mn'     => new sfWidgetFormTextarea(),
      'body_mn'        => new sfWidgetFormTextarea(),
      'trailer'        => new sfWidgetFormTextarea(),
      'rating'         => new sfWidgetFormTextarea(),
      'duration'       => new sfWidgetFormInputText(),
      'age'            => new sfWidgetFormInputText(),
      'studios'        => new sfWidgetFormTextarea(),
      'director'       => new sfWidgetFormTextarea(),
      'writer'         => new sfWidgetFormTextarea(),
      'nb_seasons'     => new sfWidgetFormInputText(),
      'nb_episodes'    => new sfWidgetFormInputText(),
      'official_link1' => new sfWidgetFormTextarea(),
      'official_link2' => new sfWidgetFormTextarea(),
      'release_date'   => new sfWidgetFormDate(),
      'casts'          => new sfWidgetFormTextarea(),
      'kickass'        => new sfWidgetFormTextarea(),
      'sort'           => new sfWidgetFormInputText(),
      'nb_views'       => new sfWidgetFormInputText(),
      'is_active'      => new sfWidgetFormInputText(),
      'is_featured'    => new sfWidgetFormInputText(),
      'boxoffice'      => new sfWidgetFormInputText(),
      'thisweek'       => new sfWidgetFormInputText(),
      'comingsoon'     => new sfWidgetFormInputText(),
      'source'         => new sfWidgetFormTextarea(),
      'created_aid'    => new sfWidgetFormInputText(),
      'updated_aid'    => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'           => new sfValidatorString(array('max_length' => 100)),
      'genre'          => new sfValidatorString(array('max_length' => 1000)),
      'title'          => new sfValidatorString(array('max_length' => 1000)),
      'title_mn'       => new sfValidatorString(array('max_length' => 1000)),
      'route'          => new sfValidatorString(array('max_length' => 1000)),
      'image'          => new sfValidatorString(array('max_length' => 1000)),
      'year'           => new sfValidatorInteger(),
      'year_end'       => new sfValidatorInteger(),
      'summary'        => new sfValidatorString(array('max_length' => 1000)),
      'body'           => new sfValidatorString(),
      'summary_mn'     => new sfValidatorString(array('max_length' => 1000)),
      'body_mn'        => new sfValidatorString(),
      'trailer'        => new sfValidatorString(array('max_length' => 1000)),
      'rating'         => new sfValidatorString(array('max_length' => 1000)),
      'duration'       => new sfValidatorInteger(),
      'age'            => new sfValidatorInteger(),
      'studios'        => new sfValidatorString(array('max_length' => 1000)),
      'director'       => new sfValidatorString(array('max_length' => 1000)),
      'writer'         => new sfValidatorString(array('max_length' => 1000)),
      'nb_seasons'     => new sfValidatorInteger(),
      'nb_episodes'    => new sfValidatorInteger(),
      'official_link1' => new sfValidatorString(array('max_length' => 1000)),
      'official_link2' => new sfValidatorString(array('max_length' => 1000)),
      'release_date'   => new sfValidatorDate(),
      'casts'          => new sfValidatorString(),
      'kickass'        => new sfValidatorString(array('max_length' => 1000)),
      'sort'           => new sfValidatorInteger(),
      'nb_views'       => new sfValidatorInteger(),
      'is_active'      => new sfValidatorInteger(),
      'is_featured'    => new sfValidatorInteger(),
      'boxoffice'      => new sfValidatorInteger(),
      'thisweek'       => new sfValidatorInteger(),
      'comingsoon'     => new sfValidatorInteger(),
      'source'         => new sfValidatorString(array('max_length' => 1000)),
      'created_aid'    => new sfValidatorInteger(),
      'updated_aid'    => new sfValidatorInteger(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
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

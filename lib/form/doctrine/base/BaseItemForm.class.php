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
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'genre'       => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormTextarea(),
      'year'        => new sfWidgetFormInputText(),
      'summary'     => new sfWidgetFormTextarea(),
      'body'        => new sfWidgetFormTextarea(),
      'trailer'     => new sfWidgetFormTextarea(),
      'rating'      => new sfWidgetFormTextarea(),
      'duration'    => new sfWidgetFormInputText(),
      'director'    => new sfWidgetFormInputText(),
      'writer'      => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'boxoffice'   => new sfWidgetFormInputText(),
      'thisweek'    => new sfWidgetFormInputText(),
      'comingsoon'  => new sfWidgetFormInputText(),
      'created_aid' => new sfWidgetFormInputText(),
      'updated_aid' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'        => new sfValidatorString(array('max_length' => 50)),
      'genre'       => new sfValidatorString(array('max_length' => 50)),
      'title'       => new sfValidatorString(array('max_length' => 50)),
      'route'       => new sfValidatorString(array('max_length' => 500)),
      'image'       => new sfValidatorString(array('max_length' => 500)),
      'year'        => new sfValidatorInteger(),
      'summary'     => new sfValidatorString(array('max_length' => 500)),
      'body'        => new sfValidatorString(),
      'trailer'     => new sfValidatorString(array('max_length' => 1000)),
      'rating'      => new sfValidatorString(array('max_length' => 1000)),
      'duration'    => new sfValidatorInteger(),
      'director'    => new sfValidatorString(array('max_length' => 100)),
      'writer'      => new sfValidatorString(array('max_length' => 100)),
      'sort'        => new sfValidatorInteger(),
      'nb_views'    => new sfValidatorInteger(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'boxoffice'   => new sfValidatorInteger(),
      'thisweek'    => new sfValidatorInteger(),
      'comingsoon'  => new sfValidatorInteger(),
      'created_aid' => new sfValidatorInteger(),
      'updated_aid' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
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

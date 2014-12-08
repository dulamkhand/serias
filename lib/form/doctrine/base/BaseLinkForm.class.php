<?php

/**
 * Link form base class.
 *
 * @method Link getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLinkForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'item_id'     => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'link'        => new sfWidgetFormTextarea(),
      'season'      => new sfWidgetFormInputText(),
      'episode'     => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'is_featured' => new sfWidgetFormInputCheckbox(),
      'created_aid' => new sfWidgetFormInputText(),
      'updated_aid' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'item_id'     => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 100)),
      'link'        => new sfValidatorString(array('max_length' => 5000)),
      'season'      => new sfValidatorInteger(),
      'episode'     => new sfValidatorInteger(),
      'sort'        => new sfValidatorInteger(),
      'nb_views'    => new sfValidatorInteger(),
      'is_active'   => new sfValidatorBoolean(),
      'is_featured' => new sfValidatorBoolean(),
      'created_aid' => new sfValidatorInteger(),
      'updated_aid' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('link[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Link';
  }

}
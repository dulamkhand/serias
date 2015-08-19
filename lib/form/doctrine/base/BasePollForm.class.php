<?php

/**
 * Poll form base class.
 *
 * @method Poll getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'item_id'         => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'route'           => new sfWidgetFormInputText(),
      'body'            => new sfWidgetFormTextarea(),
      'options_addable' => new sfWidgetFormInputText(),
      'multiple_choice' => new sfWidgetFormInputText(),
      'sort'            => new sfWidgetFormInputText(),
      'is_active'       => new sfWidgetFormInputText(),
      'is_featured'     => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_aid'     => new sfWidgetFormInputText(),
      'updated_aid'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'item_id'         => new sfValidatorInteger(),
      'title'           => new sfValidatorString(array('max_length' => 255)),
      'route'           => new sfValidatorString(array('max_length' => 255)),
      'body'            => new sfValidatorString(),
      'options_addable' => new sfValidatorInteger(),
      'multiple_choice' => new sfValidatorInteger(),
      'sort'            => new sfValidatorInteger(),
      'is_active'       => new sfValidatorInteger(),
      'is_featured'     => new sfValidatorInteger(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'created_aid'     => new sfValidatorInteger(),
      'updated_aid'     => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('poll[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Poll';
  }

}

<?php

/**
 * Feedback form base class.
 *
 * @method Feedback getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFeedbackForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'organization' => new sfWidgetFormInputText(),
      'name'         => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'phone'        => new sfWidgetFormInputText(),
      'message'      => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'created_aid'  => new sfWidgetFormInputText(),
      'updated_at'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'organization' => new sfValidatorString(array('max_length' => 255)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'email'        => new sfValidatorString(array('max_length' => 255)),
      'phone'        => new sfValidatorString(array('max_length' => 255)),
      'message'      => new sfValidatorString(),
      'created_at'   => new sfValidatorDateTime(),
      'created_aid'  => new sfValidatorInteger(),
      'updated_at'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('feedback[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feedback';
  }

}

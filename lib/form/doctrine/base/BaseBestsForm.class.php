<?php

/**
 * Bests form base class.
 *
 * @method Bests getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBestsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'best_type'   => new sfWidgetFormInputText(),
      'number'      => new sfWidgetFormInputText(),
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => false)),
      'is_active'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'best_type'   => new sfValidatorString(array('max_length' => 50)),
      'number'      => new sfValidatorInteger(),
      'item_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'))),
      'is_active'   => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
    ));

    $this->widgetSchema->setNameFormat('bests[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bests';
  }

}

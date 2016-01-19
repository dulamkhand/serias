<?php

/**
 * PollOption form base class.
 *
 * @method PollOption getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollOptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'poll_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => false)),
      'body'        => new sfWidgetFormTextarea(),
      'nb_vote'     => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormInputText(),
      'ip'          => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'poll_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'))),
      'body'        => new sfValidatorString(),
      'nb_vote'     => new sfValidatorInteger(),
      'user_id'     => new sfValidatorInteger(),
      'ip'          => new sfValidatorString(array('max_length' => 50)),
      'is_active'   => new sfValidatorInteger(),
      'sort'        => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
    ));

    $this->widgetSchema->setNameFormat('poll_option[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PollOption';
  }

}

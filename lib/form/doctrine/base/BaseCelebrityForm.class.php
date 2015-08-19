<?php

/**
 * Celebrity form base class.
 *
 * @method Celebrity getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCelebrityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'fullname'    => new sfWidgetFormInputText(),
      'fullname_mn' => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormTextarea(),
      'nickname'    => new sfWidgetFormInputText(),
      'cover'       => new sfWidgetFormTextarea(),
      'profession'  => new sfWidgetFormTextarea(),
      'birthday'    => new sfWidgetFormDate(),
      'deadday'     => new sfWidgetFormDate(),
      'about'       => new sfWidgetFormTextarea(),
      'about_mn'    => new sfWidgetFormTextarea(),
      'facebook'    => new sfWidgetFormTextarea(),
      'twitter'     => new sfWidgetFormTextarea(),
      'web'         => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'nb_love'     => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'source'      => new sfWidgetFormTextarea(),
      'created_aid' => new sfWidgetFormInputText(),
      'updated_aid' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fullname'    => new sfValidatorString(array('max_length' => 100)),
      'fullname_mn' => new sfValidatorString(array('max_length' => 100)),
      'route'       => new sfValidatorString(array('max_length' => 1000)),
      'nickname'    => new sfValidatorString(array('max_length' => 100)),
      'cover'       => new sfValidatorString(array('max_length' => 1000)),
      'profession'  => new sfValidatorString(array('max_length' => 1000)),
      'birthday'    => new sfValidatorDate(),
      'deadday'     => new sfValidatorDate(),
      'about'       => new sfValidatorString(array('max_length' => 1000)),
      'about_mn'    => new sfValidatorString(array('max_length' => 1000)),
      'facebook'    => new sfValidatorString(array('max_length' => 1000)),
      'twitter'     => new sfValidatorString(array('max_length' => 1000)),
      'web'         => new sfValidatorString(array('max_length' => 1000)),
      'sort'        => new sfValidatorInteger(),
      'nb_views'    => new sfValidatorInteger(),
      'nb_love'     => new sfValidatorInteger(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'source'      => new sfValidatorString(array('max_length' => 1000)),
      'created_aid' => new sfValidatorInteger(),
      'updated_aid' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('celebrity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Celebrity';
  }

}

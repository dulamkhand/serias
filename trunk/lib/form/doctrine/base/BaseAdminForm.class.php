<?php

/**
 * Admin form base class.
 *
 * @method Admin getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdminForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'email'           => new sfWidgetFormInputText(),
      'password'        => new sfWidgetFormInputText(),
      'mod_permissions' => new sfWidgetFormTextarea(),
      'cat_permissions' => new sfWidgetFormInputText(),
      'logged_at'       => new sfWidgetFormDateTime(),
      'sort'            => new sfWidgetFormInputText(),
      'is_active'       => new sfWidgetFormInputCheckbox(),
      'is_featured'     => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_aid'     => new sfWidgetFormInputText(),
      'updated_aid'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'password'        => new sfValidatorString(array('max_length' => 255)),
      'mod_permissions' => new sfValidatorString(array('required' => false)),
      'cat_permissions' => new sfValidatorString(array('max_length' => 255)),
      'logged_at'       => new sfValidatorDateTime(),
      'sort'            => new sfValidatorInteger(),
      'is_active'       => new sfValidatorBoolean(),
      'is_featured'     => new sfValidatorBoolean(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'created_aid'     => new sfValidatorInteger(),
      'updated_aid'     => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('admin[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Admin';
  }

}

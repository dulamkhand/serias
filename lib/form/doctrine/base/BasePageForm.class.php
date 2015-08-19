<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    uaral
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'title_de'    => new sfWidgetFormInputText(),
      'title_it'    => new sfWidgetFormInputText(),
      'title_ko'    => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'content_de'  => new sfWidgetFormTextarea(),
      'content_it'  => new sfWidgetFormTextarea(),
      'content_ko'  => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'nb_views'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'        => new sfValidatorString(array('max_length' => 50)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'title_de'    => new sfValidatorString(array('max_length' => 255)),
      'title_it'    => new sfValidatorString(array('max_length' => 255)),
      'title_ko'    => new sfValidatorString(array('max_length' => 255)),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'content'     => new sfValidatorString(),
      'content_de'  => new sfValidatorString(),
      'content_it'  => new sfValidatorString(),
      'content_ko'  => new sfValidatorString(),
      'sort'        => new sfValidatorInteger(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'nb_views'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

}

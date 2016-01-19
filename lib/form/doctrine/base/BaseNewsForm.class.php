<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNewsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(),
      'intro'       => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'intro'       => new sfValidatorString(array('max_length' => 1000)),
      'image'       => new sfValidatorString(array('max_length' => 255)),
      'content'     => new sfValidatorString(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'sort'        => new sfValidatorInteger(),
      'nb_views'    => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
    ));

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }

}

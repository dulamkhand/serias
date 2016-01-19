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
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'created_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'updated_aid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'), 'add_empty' => false)),
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
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'created_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'updated_aid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin_2'))),
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

<?php

/**
 * Episode form base class.
 *
 * @method Episode getObject() Returns the current form's model object
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEpisodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'item_id'     => new sfWidgetFormInputText(),
      'season'      => new sfWidgetFormInputText(),
      'episode'     => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormTextarea(),
      'route'       => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_views'    => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'created_aid' => new sfWidgetFormInputText(),
      'updated_aid' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'item_id'     => new sfValidatorInteger(),
      'season'      => new sfValidatorInteger(),
      'episode'     => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 500)),
      'route'       => new sfValidatorString(array('max_length' => 500)),
      'sort'        => new sfValidatorInteger(),
      'nb_views'    => new sfValidatorInteger(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'created_aid' => new sfValidatorInteger(),
      'updated_aid' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('episode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Episode';
  }

}

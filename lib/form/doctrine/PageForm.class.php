<?php

/**
 * Page form.
 *
 * @package    uaral
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
      $host = sfConfig::get('app_host');
      
      // WIDGETS
      $choices = GlobalLib::getArray('banner_position');
      $this->widgetSchema['type']        = new sfWidgetFormInputHidden();
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['title_de']    = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['title_it']    = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['title_ko']    = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['content']     = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['content_de']  = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['content_it']  = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['content_ko']  = new sfWidgetFormTextarea(array(), array());

      // VALIDATORS
      $this->validatorSchema['title_de']   = new sfValidatorPass();
      $this->validatorSchema['title_it']   = new sfValidatorPass();
      $this->validatorSchema['title_ko']   = new sfValidatorPass();
      $this->validatorSchema['content']	   = new sfValidatorPass();
      $this->validatorSchema['content_de'] = new sfValidatorPass();
      $this->validatorSchema['content_it'] = new sfValidatorPass();
      $this->validatorSchema['content_ko'] = new sfValidatorPass();
  }
}

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
      $choices = GlobalLib::getArray('page_type');
      $this->widgetSchema['type']        = new sfWidgetFormInputHidden();
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['content']     = new sfWidgetFormTextarea(array(), array());

      // VALIDATORS
      $this->validatorSchema['content']	   = new sfValidatorPass();
  }
}

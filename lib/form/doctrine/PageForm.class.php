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
      // WIDGETS
      $choices = GlobalLib::getArray('page_type');
      $this->widgetSchema['type']        = new sfWidgetFormInputHidden();
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['image']       = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['intro']    	 = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['content']     = new sfWidgetFormTextarea(array(), array());

      // VALIDATORS
      $this->validatorSchema['type']	   = new sfValidatorString();
      $this->validatorSchema['title']	   = new sfValidatorString();
      $this->validatorSchema['image']    = new sfValidatorFile($this->getFileAttrs('page'), $this->getFileOpts());
      $this->validatorSchema['intro']	   = new sfValidatorPass();
      $this->validatorSchema['content']	 = new sfValidatorPass();
  }
}

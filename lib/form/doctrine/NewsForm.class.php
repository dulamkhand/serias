<?php

/**
 * News form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {
      // WIDGETS
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['image']       = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['intro']       = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['content']     = new sfWidgetFormTextarea(array(), array());

      // VALIDATORS
      $this->validatorSchema['image']    = new sfValidatorFile($this->getFileAttrs('news'), $this->getFileOpts());
      $this->validatorSchema['intro']	   = new sfValidatorPass();
      $this->validatorSchema['content']	 = new sfValidatorPass();
  }
}

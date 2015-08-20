<?php

/**
 * User form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
  		unset($this['logged_at'], $this['activation_code'], $this['ip']);
	      
      // WIDGETS
      $this->widgetSchema['firstname']   = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['lastname']    = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['mobile']      = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['email']       = new sfWidgetFormInputText(array(), array());      
      $this->widgetSchema['password']    = new sfWidgetFormInputPassword(array(), array());
      $this->widgetSchema['avator']      = new sfWidgetFormInputFile(array(), array());
      
      // VALIDATORS
      $this->validatorSchema['firstname'] 	= new sfValidatorPass();
      $this->validatorSchema['lastname']  	= new sfValidatorPass();
      $this->validatorSchema['mobile']    	= new sfValidatorPass();
      $this->validatorSchema['email']     	= new sfValidatorEmail(array(), array());
      $this->validatorSchema['password']  	= new sfValidatorPass();
      $this->validatorSchema['avator']      = new sfValidatorFile($this->getFileAttrs('user'), $this->getFileOpts());
  }

}

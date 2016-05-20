<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegisterForm extends BaseUserForm
{
  protected $_object;
  
  public function getObject1()
  {
      return $this->_object;
  }
  
  public function configure()
  {
      unset($this['id'],$this['fullname'],$this['avator'],$this['logged_at'],$this['activation_code'],$this['ip']);
      
      // WIDGETS
      $this->widgetSchema['firstname']    = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['lastname']     = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['mobile']       = new sfWidgetFormInputText(array(), array());
      
      $this->widgetSchema['email'] 			  = new sfWidgetFormInputText(array(), array('id'=>'email'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array());
      
      // DEFAULTS
      $this->setDefault('email', 'Жш: '.sfConfig::get('app_sign_demo_email'));
      $this->setDefault('password', '');
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Та имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['firstname'] = new sfValidatorString(array(), array('required'=> 'Та нэрээ оруулна уу.'));
      $this->validatorSchema['lastname'] = new sfValidatorString(array(), array('required'=> 'Овогоо оруулна уу.'));
      $this->validatorSchema['mobile'] = new sfValidatorString(array(), array('required'=> 'Утасны дугаараа оруулна уу.'));
      $this->validatorSchema['password'] = new sfValidatorString(array(), array('required'=> 'Нууц үгээ оруулна уу.'));
  }
  
  
  public function validateEmail($validator, $value)
  {
  		if(trim($value) == "Жш: ".sfConfig::get('app_sign_demo_email')) {
  				throw new sfValidatorError($validator, 'Та бүртгэлтэй имэйл хаягаа оруулна уу.');
  		}
  		
  		// TODO: invalid email address
  		
			sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if ($user)
      {
          throw new sfValidatorError($validator, 'Имэйл хаяг бүртгэлтэй байна. Та нууц үгээ мартсан бол <a href="'.url_for('user/forgot')
          																				.'" style="text-decoration:underline;">энд /нууц үг сэргээх/</a> дарна уу.');
      }
      $this->_object = $user;
  
      return $value;
  }


}
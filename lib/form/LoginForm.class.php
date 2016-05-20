<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LoginForm extends BaseUserForm
{
  protected $_object;
  
  public function getObject1()
  {
      return $this->_object;
  }
  
  public function configure()
  {
      unset($this['id'],$this['firstname'],$this['lastname'],$this['fullname'],$this['mobile'],
            $this['avator'],$this['logged_at'],$this['activation_code'],$this['ip']);
      
      // WIDGETS
      $this->widgetSchema['email'] 			  = new sfWidgetFormInputText(array(), array('id'=>'email'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array());
      
      // DEFAULTS
      $this->setDefault('email', 'Жш: '.sfConfig::get('app_sign_demo_email'));
      $this->setDefault('password', '');
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['password'] = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validatePassword')), array('required'=>'Нууц үгээ оруулна уу.'));
  }
  
  
  public function validateEmail($validator, $value)
  {
  		if(trim($value) == "Жш: ".sfConfig::get('app_sign_demo_email')) {
  				throw new sfValidatorError($validator, 'Та бүртгэлтэй имэйл хаягаа оруулна уу.');
  		}
  		
  		// TODO: invalid email address

  		sfContext::getInstance()->getConfiguration()->loadHelpers('Url');
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if (!$user) {
          throw new sfValidatorError($validator, 'Имэйл хаяг бүртгэлгүй байна. Та бүртгүүлэхийг хүсвэл <a href="'.url_for('user/signup')
          																				.'" style="text-decoration:underline;">энд</a> дарна уу.');
      }
      $this->_object = $user;
  
      return $value;
  }


  public function validatePassword($validator, $value)
  {
      if($user = $this->_object) {
          if($user->getPassword() != md5($value)) {
              throw new sfValidatorError($validator, 'Нууц үг буруу байна.');
          }
      }
      return $value;
  }
  


}
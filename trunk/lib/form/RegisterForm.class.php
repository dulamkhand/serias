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
      unset($this['id'],$this['firstname'],$this['lastname'],$this['fullname'],$this['mobile'],
            $this['avator'],$this['logged_at'],$this['activation_code'],$this['ip']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('style'=>'width:250px;'));
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Та имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['password']   = new sfValidatorString(array(), array('required'=> 'Нууц үгээ оруулна уу.'));
      
      // LABELS
      $this->widgetSchema->setLabel('email', 'Имэйл хаяг');
      $this->widgetSchema->setLabel('password', 'Нууц үг');
  }
  
  
  public function validateEmail($validator, $value)
  {
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if ($user)
      {
          throw new sfValidatorError($validator, 'Энэ имэйл хаяг бүртгэлтэй байна. Та нууц үгээ мартсан бол энд дарна уу.');
      }
      $this->_object = $user;
  
      return $value;
  }

  public function validateConfirmPassword($validator, $value)
  {
      if($this->getObject1()->getPassword() != $value)
      {
          throw new sfValidatorError($validator, 'Давтан оруулсан нууц үг буруу байна.');
      }
      return $value;
  }
  


}
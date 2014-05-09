<?php

/**
 * Links form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LinksForm extends BaseLinksForm
{
    public function configure()
    {
        # WIDGETS
        $this->widgetSchema['serias_id'] 	 = new sfWidgetFormInputHidden(array(), array('value'=>$this->getObject('serias_id')));
        $this->widgetSchema['link']        = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['season']      = new sfWidgetFormChoice(array('choices'=>array(1, 2, 3, 4, 5)), array('class'=>'w50px'));
      	$this->widgetSchema['episode']     = new sfWidgetFormChoice(array('choices'=>array(1, 2, 3, 4, 5)), array('class'=>'w50px'));
      	  	
      	# VALIDATORS
      	$this->validatorSchema['serias_id']= new sfValidatorPass();
      	$this->validatorSchema['link']     = new sfValidatorString(array(), array());
      	$this->validatorSchema['season']   = new sfValidatorPass();
      	$this->validatorSchema['episode']  = new sfValidatorPass();
    }

}

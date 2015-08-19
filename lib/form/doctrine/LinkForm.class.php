<?php

/**
 * Link form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LinkForm extends BaseLinkForm
{
    public function configure()
    {
        # WIDGETS
        $this->widgetSchema['title'] 	     = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['item_id'] 	   = new sfWidgetFormInputHidden(array(), array('value'=>$this->getOption('itemId')));
        $this->widgetSchema['link']        = new sfWidgetFormInputText(array(), array());
        $choices = GlobalLib::getNumbers(1, 20);
        $choices[0] = '-';
        $choices[100000] = 'Special';
      	$this->widgetSchema['season']      = new sfWidgetFormChoice(array('choices'=>$choices), array('class'=>'w50px'));
      	$choices = GlobalLib::getNumbers(1, 200);
        $choices[0] = '-';
      	$this->widgetSchema['episode']     = new sfWidgetFormChoice(array('choices'=>$choices), array('class'=>'w50px'));
      	
      	# VALIDATORS
      	$this->validatorSchema['title']    = new sfValidatorPass();
      	$this->validatorSchema['item_id']  = new sfValidatorPass();
      	$this->validatorSchema['link']     = new sfValidatorString(array(), array());
      	$this->validatorSchema['season']   = new sfValidatorPass();
      	$this->validatorSchema['episode']  = new sfValidatorPass();
    }

}

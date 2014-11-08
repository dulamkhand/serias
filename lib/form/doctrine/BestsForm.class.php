<?php

/**
 * Bests form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BestsForm extends BaseBestsForm
{
	  public function configure()
	  {
	      // WIDGETS
	      $choices = GlobalLib::getArray('bests');
        $this->widgetSchema['best_type']      = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:200px;'));
        $choices = GlobalLib::getNumbers(0, 50);
        $this->widgetSchema['number']         = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:200px;'));
	      $this->widgetSchema['item_id']     		= new sfWidgetFormInputText(array(), array('onclick'=>'loadItems();'));
	      
	      // VALIDATORS
	      $this->validatorSchema['best_type']  	= new sfValidatorString(array(), array());
	      $this->validatorSchema['number']    	= new sfValidatorInteger();
	      $this->validatorSchema['item_id']    	= new sfValidatorInteger();
	  }

}

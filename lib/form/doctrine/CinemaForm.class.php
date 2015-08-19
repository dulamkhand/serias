<?php

/**
 * Cinema form.
 *
 * @package    imdb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CinemaForm extends BaseCinemaForm
{
	  public function configure()
	  {
	      // WIDGETS
	      $choices = GlobalLib::getArray('cinema');
		  $this->widgetSchema['cinema']         = new sfWidgetFormChoice(array('choices'=>$choices), array());
	      $this->widgetSchema['details']        = new sfWidgetFormTextArea(array(), array());
	      $this->widgetSchema['item_search']    = new sfWidgetFormInputText(array(), array('onkeyup'=>'itemsOptions();', 'id'=>'cinema_item_search'));
	      $choices = array();
	      $this->widgetSchema['item_id']     	= new sfWidgetFormChoice(array('choices'=>$choices), array('id'=>'cinema_item_id'));
	      
	      // VALIDATORS
	      $this->validatorSchema['cinema']  	= new sfValidatorString();
	      $this->validatorSchema['details']  	= new sfValidatorPass();
	      $this->validatorSchema['item_search'] = new sfValidatorPass();
	      $this->validatorSchema['item_id']    	= new sfValidatorInteger();
	  }

}

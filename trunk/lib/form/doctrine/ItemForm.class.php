<?php

/**
 * Item form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemForm extends BaseItemForm
{
    public function configure()
    {
        # WIDGETS
        $this->widgetSchema['title'] 	     = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['image']       = new sfWidgetFormInputFile(array(), array());
        $choices = GlobalLib::getArray('type');
      	$this->widgetSchema['type']        = new sfWidgetFormChoice(array('choices'=>$choices), array());
      	$choices = GlobalLib::getArray('genre');
      	$this->widgetSchema['genre']       = new sfWidgetFormChoice(array('choices'=>$choices), array());
      	$this->widgetSchema['year']        = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['summary']     = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['trailer']     = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['rating']      = new sfWidgetFormTextarea(array(), array());
      	$choices = GlobalLib::getNumbers(0, 30);
      	$this->widgetSchema['boxoffice']   = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:40px;'));
      	$this->widgetSchema['thisweek']    = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['comingsoon']  = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['duration']    = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['director']    = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['writer']      = new sfWidgetFormInputText(array(), array());
      	  	
      	# VALIDATORS
      	$this->validatorSchema['title']    = new sfValidatorString(array(), array());
      	$this->validatorSchema['image']    = new sfValidatorFile($this->getFileAttrs('m'), $this->getFileOpts());
      	$this->validatorSchema['type']     = new sfValidatorPass();
      	$this->validatorSchema['genre']    = new sfValidatorPass();
      	$this->validatorSchema['year']     = new sfValidatorPass();
      	$this->validatorSchema['summary']  = new sfValidatorPass();
      	$this->validatorSchema['body']     = new sfValidatorPass();
      	$this->validatorSchema['trailer']  = new sfValidatorPass();
      	$this->validatorSchema['rating']   = new sfValidatorPass();
      	$this->validatorSchema['boxoffice']= new sfValidatorPass();
      	$this->validatorSchema['thisweek'] = new sfValidatorPass();
      	$this->validatorSchema['comingsoon']= new sfValidatorPass();
      	$this->validatorSchema['duration'] = new sfValidatorPass();
      	$this->validatorSchema['director'] = new sfValidatorPass();
      	$this->validatorSchema['writer']   = new sfValidatorPass();
      	
      	#HELP
      	$this->widgetSchema->setHelp('duration', 'min');
      	
    }
}


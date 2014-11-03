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
        $this->widgetSchema['title'] 	        = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['image']          = new sfWidgetFormInputFile(array(), array());
        $choices = GlobalLib::getArray('type_mn');
      	$this->widgetSchema['type']           = new sfWidgetFormChoice(array('choices'=>$choices), array());
      	$choices = GlobalLib::getArray('genre');
      	$this->widgetSchema['genre']          = new sfWidgetFormChoice(array('choices'=>$choices), array());
      	$this->widgetSchema['year']           = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['year_end']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['release_date']   = new sfWidgetFormDate(array(), array('style'=>'width:46px;'));
      	$this->widgetSchema['summary']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body']           = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['trailer']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['rating']         = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['casts']          = new sfWidgetFormInputText(array(), array());
      	
      	$choices = GlobalLib::getNumbers(0, 30);
      	$this->widgetSchema['boxoffice']      = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['thisweek']       = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['comingsoon']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['duration']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$choices = GlobalLib::getNumbers(0, 50);
      	$this->widgetSchema['age']            = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['director']       = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['writer']         = new sfWidgetFormInputText(array(), array());
      	
        $choices = GlobalLib::getNumbers(0, 30);
        $this->widgetSchema['nb_seasons']     = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$choices = GlobalLib::getNumbers(0, 200);
      	$this->widgetSchema['nb_episodes']    = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['official_link1'] = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['official_link2'] = new sfWidgetFormInputText(array(), array());
      	
      	  	
      	# VALIDATORS
      	$this->validatorSchema['title']        = new sfValidatorString(array(), array());
      	$this->validatorSchema['image']        = new sfValidatorFile($this->getFileAttrs('m'), $this->getFileOpts());
      	$this->validatorSchema['type']         = new sfValidatorString();
      	$this->validatorSchema['genre']        = new sfValidatorString();
      	$this->validatorSchema['year']         = new sfValidatorInteger();
      	$this->validatorSchema['year_end']     = new sfValidatorInteger(array('required'=>false));
      	$this->validatorSchema['release_date'] = new sfValidatorDate();
      	$this->validatorSchema['summary']      = new sfValidatorPass();
      	$this->validatorSchema['body']         = new sfValidatorPass();
      	$this->validatorSchema['trailer']      = new sfValidatorPass();
      	$this->validatorSchema['rating']       = new sfValidatorPass();
      	
      	$this->validatorSchema['casts']        = new sfValidatorPass();
      	$this->validatorSchema['director']     = new sfValidatorPass();
      	$this->validatorSchema['writer']       = new sfValidatorPass();
      	$this->validatorSchema['duration']     = new sfValidatorPass();
      	$this->validatorSchema['age']          = new sfValidatorPass();
      	$this->validatorSchema['nb_seasons']   = new sfValidatorPass();
      	$this->validatorSchema['nb_episodes']  = new sfValidatorPass();
      	$this->validatorSchema['boxoffice']    = new sfValidatorPass();
      	$this->validatorSchema['thisweek']     = new sfValidatorPass();
      	$this->validatorSchema['comingsoon']   = new sfValidatorPass();
      	$this->validatorSchema['official_link1'] = new sfValidatorPass();
      	$this->validatorSchema['official_link2'] = new sfValidatorPass();
      	
      	#HELP
      	$this->widgetSchema->setHelp('duration', 'min');
      	$this->widgetSchema->setHelp('age', '+');
      	
    }
}


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
        $choices = GlobalLib::getArray('type_mn');
        $this->widgetSchema['type']           = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:200px;'));
        // genre is in template
        $this->widgetSchema['title'] 	        = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['title_mn'] 	    = new sfWidgetFormInputText(array(), array());
        // route
        $this->widgetSchema['image']          = new sfWidgetFormInputFile(array(), array());
      	$this->widgetSchema['year']           = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['year_end']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$years = range(date('Y') + 2, date('Y') - 40);
      	$this->widgetSchema['release_date']   = new sfWidgetFormDate(array('years'=>array_combine($years, $years), 'format'=>'%year%/%month%/%day%'), array('style'=>'width:60px;'));
      	$this->widgetSchema['summary']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['summary_mn']     = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body']           = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body_mn']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['trailer']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['rating']         = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['kickass']        = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['casts']          = new sfWidgetFormInputText(array(), array());

      	$choices = GlobalLib::getNumbers(0, 30);
      	$this->widgetSchema['boxoffice']      = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['thisweek']       = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['comingsoon']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['duration']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$choices = GlobalLib::getNumbers(0, 50);
      	$this->widgetSchema['age']            = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['studios']        = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['director']       = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['writer']         = new sfWidgetFormInputText(array(), array());
      	
        $choices = GlobalLib::getNumbers(0, 30);
        $this->widgetSchema['nb_seasons']     = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$choices = GlobalLib::getNumbers(0, 200);
      	$this->widgetSchema['nb_episodes']    = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['official_link1'] = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['official_link2'] = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['source']         = new sfWidgetFormInputText(array(), array());
      	
      	  	
      	# VALIDATORS
      	$this->validatorSchema['type']         = new sfValidatorString();
      	$this->validatorSchema['genre']        = new sfValidatorPass();
				$this->validatorSchema['title']    	   = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateTitle')), array());
      	$this->validatorSchema['title_mn']     = new sfValidatorPass();
      	$this->validatorSchema['image']        = new sfValidatorFile($this->getFileAttrs('m'), $this->getFileOpts());
      	$this->validatorSchema['year']         = new sfValidatorInteger();
      	$this->validatorSchema['year_end']     = new sfValidatorInteger(array('required'=>false));
      	$this->validatorSchema['release_date'] = new sfValidatorDate();
      	$this->validatorSchema['summary']      = new sfValidatorString();
      	$this->validatorSchema['summary_mn']   = new sfValidatorPass();
      	$this->validatorSchema['body']         = new sfValidatorPass();
      	$this->validatorSchema['body_mn']      = new sfValidatorPass();
      	$this->validatorSchema['trailer']      = new sfValidatorString();
      	$this->validatorSchema['rating']       = new sfValidatorPass();
      	$this->validatorSchema['kickass']      = new sfValidatorPass();
      	$this->validatorSchema['casts']        = new sfValidatorString();
      	$this->validatorSchema['age']          = new sfValidatorInteger();
      	$this->validatorSchema['studios']      = new sfValidatorString();
      	$this->validatorSchema['director']     = new sfValidatorPass();
      	$this->validatorSchema['writer']       = new sfValidatorPass();
      	$this->validatorSchema['duration']     = new sfValidatorInteger();
      	$this->validatorSchema['nb_seasons']   = new sfValidatorPass();
      	$this->validatorSchema['nb_episodes']  = new sfValidatorPass();
      	$this->validatorSchema['boxoffice']    = new sfValidatorPass();
      	$this->validatorSchema['thisweek']     = new sfValidatorPass();
      	$this->validatorSchema['comingsoon']   = new sfValidatorPass();
      	$this->validatorSchema['official_link1'] = new sfValidatorString();
      	$this->validatorSchema['official_link2'] = new sfValidatorString();
      	$this->validatorSchema['source']         = new sfValidatorString();
      	
      	#HELP
      	$this->widgetSchema->setHelp('genre', 'Ctrl + Mouse left click дарж зэрэг сонгоно уу.');      	
      	$this->widgetSchema->setHelp('duration', 'min');
      	$this->widgetSchema->setHelp('age', '+');
      	
      	#LABEL
      	$this->widgetSchema->setLabel('official_link1', 'Official facebook');
      	$this->widgetSchema->setLabel('official_link2', 'Official website');
      	
    }
	
		public function validateTitle($validator, $value)
	  {
			  if ($this->getObject()->isNew() && Doctrine::getTable('Item')->findOneByTitle($value)) {
				  	throw new sfValidatorError($validator, 'Same titled movie already exists.');
			  }
			  return $value;
	  }
}


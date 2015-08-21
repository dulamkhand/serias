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
		unset($this['source']);
        # WIDGETS
        $choices = GlobalLib::getArray('type_mn');
        $this->widgetSchema['type']           = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:200px;'));
        // genre is in template
        $this->widgetSchema['title'] 	        = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['title_mn'] 	    = new sfWidgetFormInputText(array(), array());
        $object = $this->getObject();
    	  $folder = ($object && $object->getFolder()) ? $object->getFolder() : date('Ym');
    	  $this->widgetSchema['folder']         = new sfWidgetFormInputHidden(array(), array('value'=>$folder));
        $this->widgetSchema['image']          = new sfWidgetFormInputFile(array(), array());
        $this->widgetSchema['cover']          = new sfWidgetFormInputFile(array(), array());
      	$this->widgetSchema['year']           = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['year_end']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$years = range(date('Y') + 3, date('Y') - 100);
      	$this->widgetSchema['release_date']   = new sfWidgetFormDate(array('years'=>array_combine($years, $years), 'format'=>'%year%/%month%/%day%'), array('style'=>'width:60px;'));
      	$this->widgetSchema['summary']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['summary_mn']     = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body']           = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['body_mn']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['trailer']        = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['rating']         = new sfWidgetFormTextarea(array(), array());
      	$this->widgetSchema['casts']          = new sfWidgetFormInputText(array(), array());

      	$this->widgetSchema['duration']       = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$choices = GlobalLib::getNumbers(0, 50);
      	$this->widgetSchema['age']            = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      	$this->widgetSchema['studios']        = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['director']       = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['writer']         = new sfWidgetFormInputText(array(), array());
      	
      	$choices = GlobalLib::getNumbers(0, 30);
      	$this->widgetSchema['boxoffice']      = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['boxoffice_mn']   = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['thisweek']       = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['comingsoon']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      	$this->widgetSchema['is_watch_online']       = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['is_torrent_download']   = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['is_mongolian_language'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	
      	
        $choices = GlobalLib::getNumbers(0, 30);
        $this->widgetSchema['nb_seasons']     = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$choices = GlobalLib::getNumbers(0, 200);
      	$this->widgetSchema['nb_episodes']    = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:46px;'));
      	$this->widgetSchema['official_link1'] = new sfWidgetFormInputText(array(), array());
      	$this->widgetSchema['official_link2'] = new sfWidgetFormInputText(array(), array());
		
				$this->widgetSchema['kickass']           = new sfWidgetFormInputText(array(), array());
				$this->widgetSchema['torrentz']          = new sfWidgetFormInputText(array(), array());
				$this->widgetSchema['extratorrent']      = new sfWidgetFormInputText(array(), array());
				$this->widgetSchema['freetvvideoonline'] = new sfWidgetFormInputText(array(), array());
				$this->widgetSchema['youtube']           = new sfWidgetFormInputText(array(), array());
      	
      	# VALIDATORS
      	$this->validatorSchema['type']         = new sfValidatorString();
      	$this->validatorSchema['genre']        = new sfValidatorPass();
				$this->validatorSchema['title']    	   = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateTitle')), array());
      	$this->validatorSchema['title_mn']     = new sfValidatorPass();
      	$this->validatorSchema['folder']       = new sfValidatorPass();
      	$this->validatorSchema['image']        = new sfValidatorFile($this->getFileAttrs($folder), $this->getFileOpts());
      	$this->validatorSchema['cover']        = new sfValidatorFile($this->getFileAttrs($folder), $this->getFileOpts());
      	$this->validatorSchema['year']         = new sfValidatorInteger();
      	$this->validatorSchema['year_end']     = new sfValidatorInteger(array('required'=>false));
      	$this->validatorSchema['release_date'] = new sfValidatorDate();
      	$this->validatorSchema['summary']      = new sfValidatorString();
      	$this->validatorSchema['summary_mn']   = new sfValidatorPass();
      	$this->validatorSchema['body']         = new sfValidatorPass();
      	$this->validatorSchema['body_mn']      = new sfValidatorPass();
      	$this->validatorSchema['trailer']      = new sfValidatorString();
      	$this->validatorSchema['rating']       = new sfValidatorPass();
      	$this->validatorSchema['casts']        = new sfValidatorString();
      	$this->validatorSchema['age']          = new sfValidatorInteger();
      	$this->validatorSchema['studios']      = new sfValidatorString();
      	$this->validatorSchema['director']     = new sfValidatorPass();
      	$this->validatorSchema['writer']       = new sfValidatorPass();
      	$this->validatorSchema['duration']     = new sfValidatorInteger();
      	$this->validatorSchema['boxoffice']    = new sfValidatorPass();
      	$this->validatorSchema['boxoffice_mn'] = new sfValidatorPass();
      	$this->validatorSchema['thisweek']     = new sfValidatorPass();
      	$this->validatorSchema['comingsoon']   = new sfValidatorPass();
      	$this->validatorSchema['is_watch_online']   		= new sfValidatorPass();
      	$this->validatorSchema['is_torrent_download']   = new sfValidatorPass();
      	$this->validatorSchema['is_mongolian_language'] = new sfValidatorPass();
      	$this->validatorSchema['nb_seasons']   = new sfValidatorPass();
      	$this->validatorSchema['nb_episodes']  = new sfValidatorPass();
      	$this->validatorSchema['official_link1'] = new sfValidatorUrl(array('required'=>false), array());
      	$this->validatorSchema['official_link2'] = new sfValidatorUrl();
				$this->validatorSchema['kickass']      = new sfValidatorPass();
      	$this->validatorSchema['torrentz']     = new sfValidatorPass();
      	$this->validatorSchema['extratorrent'] = new sfValidatorPass();
      	$this->validatorSchema['freetvvideoonline'] = new sfValidatorPass();
      	$this->validatorSchema['youtube']      = new sfValidatorPass();
      	
      	#HELP
      	$this->widgetSchema->setHelp('genre', 'Ctrl + Mouse left click дарж зэрэг сонгоно уу.');      	
      	$this->widgetSchema->setHelp('duration', 'min');
      	$this->widgetSchema->setHelp('age', '+');
				$this->widgetSchema->setHelp('official_link1', '');
				$this->widgetSchema->setHelp('official_link2', '');
				$this->widgetSchema->setHelp('kickass', 'link');
				$this->widgetSchema->setHelp('torrentz', 'link');
				$this->widgetSchema->setHelp('extratorrent', 'link');
				$this->widgetSchema->setHelp('freetvvideoonline', 'embed code');
				$this->widgetSchema->setHelp('youtube', 'шууд үзэх');
				$this->widgetSchema->setHelp('cover', 'Official web эсвэл Official facebook хуудаснаас 1000 x 300 хэмжээтэй зураг оруулах');
      	
      	#LABEL
      	$this->widgetSchema->setLabel('official_link1', 'Official facebook');
      	$this->widgetSchema->setLabel('official_link2', 'Official website');
      	$this->widgetSchema->setLabel('kickass', 'kickass.to');
      	$this->widgetSchema->setLabel('torrentz', 'torrentz.eu');
      	$this->widgetSchema->setLabel('extratorrent', 'extratorrent.cc');
      	$this->widgetSchema->setLabel('freetvvideoonline', 'free-tv-video-online.me');
      	$this->widgetSchema->setLabel('youtube', 'youtube.com');
      	
    }
	
		public function validateTitle($validator, $value)
	  {
			  if ($this->getObject()->isNew() && Doctrine::getTable('Item')->findOneByTitle($value)) {
				  	throw new sfValidatorError($validator, 'Same titled movie already exists.');
			  }
			  return $value;
	  }
}


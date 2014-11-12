<?php

/**
 * Project form base class.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
    public function setup()
    {
          unset($this['id'],$this['route'],$this['nb_views'],$this['nb_love'],$this['sort'],
          $this['created_at'],$this['updated_at'],$this['created_aid'],$this['updated_aid']);
          
          # WIDGETS
          $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
          $this->widgetSchema['is_active']   = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
          $this->widgetSchema['is_featured'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
  
          # DEFUALTS
          $this->setDefault('is_active', 1);
          
          # VALIDATORS
          $this->validatorSchema['sort']        = new sfValidatorPass();
          $this->validatorSchema['is_active']   = new sfValidatorPass();
          $this->validatorSchema['is_featured'] = new sfValidatorPass();
                        
          # HELPS  
          $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<span class="help">%help%</span>');  
    }
    
    
    function getFileAttrs($folder, $required=false, $maxsize=10, $mime=array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif')) {
        return array('required'   => $required,
                     'path'       => sfConfig::get("sf_upload_dir")."/".$folder,
                     'max_size'   => ($maxsize*1024*1024),
                     'mime_types' => $mime);
    }
    
    function getFileOpts($maxsize='10MB', $ext='jpg, png, gif') {
        return array('max_size'   => 'File max size: '.$maxsize,
                     'mime_types' => 'Allowed extentions: '.$ext);
    }

    function getFileHelp() {
        return ' < 1MB | jpg, jpeg, gif';
    }
}

<?php

require_once 'c://wamp//www//symfony14//lib/autoload/sfCoreAutoload.class.php';
//require_once dirname(__FILE__).'/../../symfony14/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins('sfDoctrinePlugin', 'sfThumbnailPlugin', 'sfImageTransformPlugin', 'sfDatePickerTimePlugin', 'sfFormExtraPlugin');
      
      sfConfig::set('sf_web_dir', 'C:\wamp\www\mmdb\web');
      sfConfig::set('sf_upload_dir', 'C:\wamp\www\mmdb\web\u');
      sfConfig::set('rich_text_fck_js_dir', 'C:\wamp\www\mmdb\web\js');

//      sfConfig::set('sf_web_dir', dirname(__FILE__).'/../..');
//      sfConfig::set('sf_upload_dir', dirname(__FILE__).'/../../u');
//      sfConfig::set('rich_text_fck_js_dir', dirname(__FILE__).'/../../js');
  }

}

<?php

require_once 'c://wamp//www//symfony14//lib/autoload/sfCoreAutoload.class.php';
//require_once '/home1/urinesse/public_html/girasole/symfony14/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins('sfDoctrinePlugin', 'sfThumbnailPlugin');
      
      sfConfig::set('sf_web_dir', 'C:\wamp\www\imdb\web');
      sfConfig::set('sf_upload_dir', 'C:\wamp\www\imdb\web\u');
      sfConfig::set('rich_text_fck_js_dir', 'C:\wamp\www\imdb\web\js');
      
      //sfConfig::set('sf_web_dir', '/home1/urinesse/public_html/girasole/imdb/web');
      //sfConfig::set('sf_upload_dir', '/home1/urinesse/public_html/girasole/imdb/web/u');
      //sfConfig::set('rich_text_fck_js_dir', '/home1/urinesse/public_html/girasole/imdb/web/js');
  }

}

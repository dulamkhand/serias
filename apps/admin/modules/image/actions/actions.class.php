<?php

/**
 * image actions.
 *
 * @package    grand
 * @subpackage image
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends sfActions
{

  public function preExecute() {
      //$this->forwardUnless($this->getUser()->hasCredential('image'), 'admin', 'perm'); TODO
  }
  
  public function executeDownloadImages(sfWebRequest $request)
  { 
      $objectId = 114;
      $urls = array(
          "http://www4.pictures.gi.zimbio.com/Stars+FOX+Return+Jezebel+James+Host+Storytime+BeKh3SFQq4dl.jpg",
          "http://thetvaddict.com/wp-content/uploads/2008/01/jezebel2.jpg",
          "http://cdn2.crushable.com/wp-content/uploads/2008/03/jezebel-james-premiere-01.jpg",
          "http://www.thetvaddict.com/wp-content/uploads/2008/01/jezebel5.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMjEwNTk4OTY3Nl5BMl5BanBnXkFtZTcwNjU3Mjk1MQ@@._V1_SX640_SY720_.jpg",
          "http://www1.pictures.gi.zimbio.com/Stars+FOX+Return+Jezebel+James+Host+Storytime+R4CsBzenbtjl.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTQ1Nzk0MTUwOV5BMl5BanBnXkFtZTcwNDU3Mjk1MQ@@._V1_SX640_SY720_.jpg",
          "http://graphics8.nytimes.com/images/2008/02/28/arts/02itzk600.1.jpg",
          "http://www.tvchronik.com/wp-content/uploads/2007/07/jennifer-morrison-tca-2007.jpg",
          "http://assets2.ignimgs.com/2008/03/15/the-return-of-jezebel-james-20080314051308322-2325046.jpg",
          "http://static.tvgcdn.net/MediaBin/Galleries/Shows/M_R/Ra_Rh/Return_of_Jezebel_James/season1/return-jezebel-james-mclarty10.jpg",
          "http://media3.popsugar-assets.com/files/upl0/20/202476/11_2008/parkerlauren.jpg",
          "http://cdn2.crushable.com/wp-content/uploads/2008/03/jezebel-james-1.03-02.jpg",
          "http://www.serialmente.com/wp-content/uploads/2008/03/jj_1x02.jpg",
          "http://celebrities.ninemsn.com.au/img/tvblog/08aug/ar_foxyladies.jpg",
          "http://cdn3-www.afterellen.com/assets/uploads/images/jasikanicole.jpg",
          "http://www.sitcomsonline.com/photopost/data/2352/thereturnofjezebeljames-laurenambrose2.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTc5NzUzMDYyNl5BMl5BanBnXkFtZTcwMDY3Mjk1MQ@@._V1_SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTMyOTQxMjg0NV5BMl5BanBnXkFtZTcwMTY3Mjk1MQ@@._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMjEwMzAyNTg5N15BMl5BanBnXkFtZTcwMjY3Mjk1MQ@@._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BNzE2NDMyNzI2NV5BMl5BanBnXkFtZTcwMzY3Mjk1MQ@@._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BNzE2NDMyNzI2NV5BMl5BanBnXkFtZTcwMzY3Mjk1MQ@@._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTE5Mjk2MTExNl5BMl5BanBnXkFtZTYwMTQxOTA3._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTQ1Nzk0MTUwOV5BMl5BanBnXkFtZTcwNDU3Mjk1MQ@@._V1__SX640_SY720_.jpg",
          "http://ia.media-imdb.com/images/M/MV5BMTQ1Nzk0MTUwOV5BMl5BanBnXkFtZTcwNDU3Mjk1MQ@@._V1__SX640_SY720_.jpg",
		);

      $i = 0;
      $folder = date('Ym');
      foreach($urls as $url) {
          $filename = $objectId.'-'.++$i.'.jpg';
          // create image
        	$img = imagecreatefromstring(file_get_contents($url));
        	imagejpeg($img, sfConfig::get('sf_upload_dir')."/".$folder.'/'.$filename);
        	// save in db
        	$image = new Image();
          $image->setObjectType('item');
          $image->setObjectId($objectId);
          $image->setFolder($folder);
          $image->setFilename($filename);
          $image->setUpdatedAt(date('Y-m-d H:i:s'));
          $image->setCreatedAid(1);
          $image->setUpdatedAid(1);
          $image->save();
          // create thumb
          GlobalLib::createThumbs($filename, $folder, array(120));
          // create waterlink
          $filepath = sfConfig::get('sf_upload_dir').'/'.$folder.'/'.$filename;
          $img = new sfImage($filepath);
          $img->overlay(new sfImage(sfConfig::get('sf_web_dir').'/images/watermark200.png'), 'bottom-right');
          $img->saveAs($filepath);
      }
      echo 'DONE'; die();
  }


  public function executeNew(sfWebRequest $request)
  {
      $this->forward404Unless($objectType = $request->getParameter('objectType'));
      $this->forward404Unless($this->rs = Doctrine_Core::getTable(ucfirst($objectType))->find($request->getParameter('objectId')));
      $this->form = new ImageForm(null, array('objectId'=>$this->rs->getId(), 'objectType'=>$objectType));
      $this->objectType = $objectType;
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $form = $request->getParameter('image');
      $objectId = $request->getParameter('objectId') ? $request->getParameter('objectId') : $form['object_id'];
      $objectType = $request->getParameter('objectType') ? $request->getParameter('objectType') : $form['object_type'];
      $this->forward404Unless($this->rs = Doctrine_Core::getTable(ucfirst($objectType))->find($objectId));
      
      $this->form = new ImageForm(null, array('objectId'=>$objectId, 'objectType'=>$objectType));
      $this->processForm($request, $this->form);
      $this->objectType = $objectType;
      $this->setTemplate('new');
  }
  

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $this->forward404Unless($this->rs = Doctrine_Core::getTable(ucfirst($image->getObjectType()))->find($image->getObjectId()));
      $this->form = new ImageForm($image, array('objectId'=>$image->getObjectId(), 'objectType'=>$image->getObjectType()));
      $this->objectType = $image->getObjectType();
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $this->forward404Unless($this->rs = Doctrine_Core::getTable(ucfirst($image->getObjectType()))->find($image->getObjectId()));
      $this->form = new ImageForm($image, array('objectId'=>$image->getObjectId(), 'objectType'=>$image->getObjectType()));
      $this->processForm($request, $this->form);
      $this->objectType = $image->getObjectType();
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $objectId = $image->getObjectId();
      $objectType = $image->getObjectType();
      $image->delete();
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      $this->redirect('image/new?objectType='.$objectType.'&objectId='.$objectId);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid()) {
          $image = $form->save();
          $image->setUpdatedAt(date('Y-m-d H:i:s'));

          if($form->getValue('filename') && file_exists(sfConfig::get('sf_upload_dir').'/'.$image->getFolder().'/'.$image->getFilename())) {
              GlobalLib::createThumbs($image->getFilename(), $image->getFolder(), array(120));
              // create waterlink
              $filepath = sfConfig::get('sf_upload_dir').'/'.$image->getFolder().'/'.$image->getFilename();
              $img = new sfImage($filepath);
              $img->overlay(new sfImage(sfConfig::get('sf_web_dir').'/images/watermark200.png'), 'bottom-right');
              $img->saveAs($filepath);
          }
          $image->save();

          // save cover photo for object
          /*if($image->getIsCover()) {
              $obj = Doctrine::getTable(ucfirst($image->getObjectType()))->find($image->getObjectId());
              if($obj){
                  $obj->setCover('/u/'.$image->getFolder().'/'.$image->getFilename());
                  $obj->save();	  
              }
          }*/

          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('image/new?objectType='.$image->getObjectType().'&objectId='.$image->getObjectId());
      }
  }

}
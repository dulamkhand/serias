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
      $urls = array(
          "http://content8.flixster.com/rtmovie/10/35/103554_gal.jpg",
          "http://content7.flixster.com/rtmovie/10/35/103553_gal.jpg",
          "http://content6.flixster.com/rtmovie/10/35/103552_gal.jpg",
          "http://content9.flixster.com/rtmovie/10/35/103551_gal.jpg",
          "http://content9.flixster.com/rtmovie/10/35/103547_gal.jpg",
          "http://content8.flixster.com/rtmovie/10/35/103546_gal.png",
          "http://content6.flixster.com/rtmovie/10/35/103544_gal.jpg",
          "http://content9.flixster.com/rtmovie/10/35/103543_gal.jpg",
          "http://content8.flixster.com/rtmovie/10/35/103542_gal.jpg",
          "http://content7.flixster.com/rtmovie/10/35/103541_gal.jpg",
          "http://content6.flixster.com/rtmovie/10/35/103540_gal.jpg",
          "http://content9.flixster.com/rtmovie/10/35/103539_gal.jpg",
          "http://content8.flixster.com/rtmovie/10/35/103538_gal.jpg",
          "http://content7.flixster.com/rtmovie/10/35/103537_gal.jpg",
          "http://content6.flixster.com/rtmovie/10/35/103536_gal.jpg",
          "http://content9.flixster.com/rtmovie/10/35/103535_gal.jpg",
          "http://content8.flixster.com/rtmovie/10/35/103534_gal.jpg",
          "http://content7.flixster.com/rtmovie/10/35/103533_gal.jpg",
          "http://content6.flixster.com/rtmovie/10/35/103532_gal.jpg",
          "http://content8.flixster.com/rtmovie/10/35/103530_gal.jpg",
          "http://content6.flixster.com/rtmovie/10/35/103528_gal.png",
          "http://content8.flixster.com/rtmovie/10/33/103358_gal.jpg",
          "http://content7.flixster.com/rtmovie/98/10/98109_gal.jpg",
      );

      $i = 0;
      $objectId = 3;//$request->getParameter('objectId');
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
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
      $objectId = 9;//$request->getParameter('objectId');
      $urls = array(
          "http://teniesonline.ucoz.com/_ld/47/11654753.jpg",
          "http://content6.flixster.com/rtmovie/49/56/49564_gal.jpg",
          "http://content9.flixster.com/rtmovie/49/35/49351_gal.jpg",
          "http://content6.flixster.com/rtmovie/49/23/49236_gal.jpg",
          "http://content6.flixster.com/rtmovie/49/11/49112_gal.jpg",
          "http://content8.flixster.com/rtmovie/48/97/48978_gal.jpg",
          "http://content6.flixster.com/rtmovie/48/84/48840_gal.jpg",
          "http://content9.flixster.com/rtmovie/48/53/48535_gal.jpg",
          "http://content7.flixster.com/rtmovie/48/36/48365_gal.jpg",
          "http://content9.flixster.com/rtmovie/47/39/47391_gal.jpg",
          "http://content6.flixster.com/rtmovie/47/16/47168_gal.jpg",
          "http://content8.flixster.com/rtmovie/45/81/45810_gal.jpg",
          "http://content9.flixster.com/rtmovie/45/47/45471_gal.jpg",
          "http://content6.flixster.com/rtmovie/43/34/43344_gal.jpg",
          "http://content6.flixster.com/rtmovie/41/64/41644_gal.jpg",
          "http://lh5.ggpht.com/_JXCWMQY9mf8/TTTx9dmvAQI/AAAAAAAAJHs/6_Vq-qc9M9A/behind-the-mask_ron-perlman-hellboy_sin-mascara.jpg",
          "http://www1.pictures.gi.zimbio.com/LAFF+Screening+Hellboy+II+Golden+Army+Arrivals+AdhmK18LlAVl.jpg",
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
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
	  	ini_set('memory_limit', '1024M');
      $objectId = 166;	
	  	$i = 23;
      $urls = array(
      		"http://hollywoodmoviewiki.com/wp-content/uploads/2014/05/the-hundred-foot-journey-movie-image-7.jpg",
      		"http://static2.opensubtitles.org/gfx/thumbs/8/4/6/0/2980648.jpg",
      		"http://images.fandango.com/r95.1/imagerelay/300/0/video.fandango.com%2FFandangoMovies%2F899338_080.jpg/image.jpg/redesign/static/img/noxSquare.jpg",
      		"http://cdn.abclocal.go.com/content/wabc/images/cms/AP204458480818_15.jpg",
      		"http://pmcdeadline2.files.wordpress.com/2014/05/hundredfootjourney_c__140513170125.jpg",
      		"http://www1.pictures.zimbio.com/gi/Manish+Dayal+Hundred+Foot+Journey+Premieres+R6pnCTwpy_Yl.jpg",
      		"http://cdn.abclocal.go.com/content/wabc/images/cms/AP18880604188_0.jpg",
      		"http://www4.pictures.zimbio.com/gi/Manish+Dayal+Hundred+Foot+Journey+Premieres+oI_BbcAdK1gl.jpg",
      		"http://www3.pictures.zimbio.com/gi/Manish+Dayal+Hundred+Foot+Journey+Premieres+cH7a6MdhH29l.jpg",
      		"http://images.huffingtonpost.com/2014-08-13-tomkira100footuse-thumb.jpg",
      		"http://www2.pictures.zimbio.com/gi/Hundred+Foot+Journey+Premieres+NYC+_LZKb4uYVL0x.jpg",
      		"http://www2.pictures.zimbio.com/gi/Courtney+Reed+Hundred+Foot+Journey+Premieres+XNJjtENs8lHl.jpg",
      		"http://www3.pictures.zimbio.com/gi/Helen+Mirren+Hundred+Foot+Journey+photocall+BLQv2z521zll.jpg",
      		"http://static.ibnlive.in.com/ibnlive/pix/slideshow/08-2014/the-hundredfoot-journey/100footjourney1.jpg",
      		"http://www3.pictures.zimbio.com/gi/Charlotte+Le+Bon+Hundred+Foot+Journey+Premieres+Lyx1h9Bg0b7l.jpg",
      		"http://www3.pictures.zimbio.com/gi/Manish+Dayal+Hundred+Foot+Journey+Premiere+5wI2q7TUJMhl.jpg",
      		"http://www3.pictures.zimbio.com/gi/Manish+Dayal+Hundred+Foot+Journey+Photo+Call+s1d1BCMK3UIl.jpg",
      		"http://www4.pictures.zimbio.com/gi/Amit+Shah+Hundred+Foot+Journey+Premieres+NYC+xrqMkFpqTcSl.jpg",
      		"http://ww2.hdnux.com/photos/31/42/62/6696109/3/622x350.jpg",
      		"http://www3.pictures.zimbio.com/gi/Helen+Mirren+Hundred+Foot+Journey+Premiere+F1f8ks_jlezl.jpg",
	  	);
      $folder = date('Ym');
		  $udir = sfConfig::get('sf_upload_dir');
		  $wdir = sfConfig::get('sf_web_dir');
      foreach($urls as $url) {
	        $filename = $objectId.'-'.++$i.'.jpg';
	        // create image
	      	$img = imagecreatefromstring(file_get_contents($url));
	      	imagejpeg($img, $udir."/".$folder.'/'.$filename);
					// create thumb
					GlobalLib::createThumbs($filename, $folder, array(120));
					// create waterlink
		      $filepath = $udir.'/'.$folder.'/'.$filename;
		      $img = new sfImage($filepath);
		      $img->overlay(new sfImage($wdir.'/images/watermark200.png'), 'bottom-right');
		      $img->saveAs($filepath);
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
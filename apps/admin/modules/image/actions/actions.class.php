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
      $objectId = 140;
	  	$i = 0;
      $urls = array(
      		"http://ia.media-imdb.com/images/M/MV5BMTYwNDQxMTg3Nl5BMl5BanBnXkFtZTcwNzEzODQ0Nw@@._V1_SX640_SY720_.jpg",
      		"http://upload.wikimedia.org/wikipedia/en/0/0a/SunsetBoulevardfilmposter.jpg",
      		"http://4.bp.blogspot.com/-cvt7dKmrgOg/UQ1CQY9odVI/AAAAAAAAF7s/9QyJWgUdnQs/s1600/sunset-boulevard-1950-1.jpg",
      		"http://www.lassothemovies.com/wp-content/uploads/2012/08/Sunset-Blvd.-2.jpg",
      		"http://www.eskimo.com/~noir/ftitles/sunset/sunset01.jpg",
      		"http://eng.cinemacity.org/media_lib/files/sunset_blvd2.jpg",
      		"https://img-rp.vhd.me/2727878_l2.jpg",
      		"http://lh4.ggpht.com/_SrxRt4fvC2Y/SRMcCEOYwBI/AAAAAAAACc8/Hp94z3Ah0Ns/s400/SunsetBlvd_Still_PK_11454-097.jpg",
      		"http://www.premiere.fr/var/premiere/storage/images/cinema/photos-film/photos-acteur/images/boulevard-du-crepuscule-sunset-blvd-sunset-boulevard-1950__13/15839961-1-fre-FR/boulevard_du_crepuscule_sunset_blvd_sunset_boulevard_1950_diaporama_portrait.jpg",
      		"http://www.impawards.com/1950/posters/sunset_boulevard_ver13_xlg.jpg",
      		"http://img22.mtime.cn/up/2011/09/12/191709.36727937_o.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjkyNTUwMTY2Nl5BMl5BanBnXkFtZTcwODEzODQ0Nw@@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjI5MDQ3NjcwOV5BMl5BanBnXkFtZTcwMjIzODQ0Nw@@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTQzNjIwMTAxMV5BMl5BanBnXkFtZTYwMjYyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTkyMTcwMDE4NF5BMl5BanBnXkFtZTYwNjYyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjAyMjQzODU5MV5BMl5BanBnXkFtZTYwNTcyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTA2MTgyMDU3NTleQTJeQWpwZ15BbWU2MDUyMTg0Ng@@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNDkxNTY0MTAwNl5BMl5BanBnXkFtZTYwNjMxODQ2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjAwMDcyMjk2M15BMl5BanBnXkFtZTcwMDM1NjcxMw@@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTU2NjgxMjIyNl5BMl5BanBnXkFtZTYwMjcyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTU5ODY0MTY0Nl5BMl5BanBnXkFtZTYwNzcyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTI4MTM2NTE1NV5BMl5BanBnXkFtZTYwODYyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BODg5ODM0NzkyMV5BMl5BanBnXkFtZTYwMDcyODM2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjE0Nzg2NTU3MF5BMl5BanBnXkFtZTYwNjUxODQ2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTY0NzIzODg5OV5BMl5BanBnXkFtZTYwMDQxODQ2._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjIwNDA3NjI4Nl5BMl5BanBnXkFtZTgwMjMxNDg5MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BOTY2MTQ3OTI0MF5BMl5BanBnXkFtZTgwODc1MTczMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTQ4OTc4NjcyOF5BMl5BanBnXkFtZTgwOTc1MTczMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTg1NTY3MTU5Ml5BMl5BanBnXkFtZTgwMTg1MTczMTE@._V1__SX640_SY720_.jpg",
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
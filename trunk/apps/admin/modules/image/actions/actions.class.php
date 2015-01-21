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
      $objectId = 175;	
	  	$i = 0;
      $urls = array(
      		"http://static.rogerebert.com/uploads/movie/movie_poster/noah-2014/large_NOAHPOSTER.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNDE1MTkzNzc0MF5BMl5BanBnXkFtZTgwMjYxNDEyMjE@._V1_SX640_SY720_.jpg",
      		"http://i3.cdnds.net/14/11/618x900/emma-watson-noah-premiere-berlin-march-2014.jpg",
      		"http://photos.vanityfair.com/2014/03/28/5335ae411379d1442812bfe2_emma-watson.jpg",
      		"http://i1.cdnds.net/14/14/300x450/emma-watson-noah-dress.jpg",
      		"http://www1.pictures.zimbio.com/gi/Emma+Watson+Noah+Premieres+Berlin+Pw0dDGzlstJl.jpg",
      		"http://www.hdwallpapersdose.com/wp-content/uploads/2013/12/emma-watson-noah-movie-2014-photo.jpg",
      		"http://www.geeklegacy.com/wp-content/uploads/2014/03/noah-animals-600x342.jpg",
      		"http://www.lawyersgunsmoneyblog.com/wp-content/uploads/2014/03/crowe.jpg",
      		"http://content5.video.news.com.au/NDM_-_news.com.au/278/593/2438545594_promo217202032_648x365_2438545597-hero.jpg",
      		"http://media-cache-ec0.pinimg.com/736x/14/4b/5f/144b5fd0d5317dfd49030b3cf2a09536.jpg",
      		"http://www.sandgent.co.uk/main/wp-content/uploads/2013/11/Noah-2014-banner.jpg",
      		"http://www.moviequotesandmore.com/images/noah-2014-movie-review-21770794.jpg",
      		"http://www.aceshowbiz.com/images/still/noah-image06.jpg",
      		"http://hd.wallpaperswide.com/thumbs/noah_2014_film-t2.jpg",
      		"http://www.aceshowbiz.com/images/still/noah-image09.jpg",
      		"http://i.dailymail.co.uk/i/pix/2013/12/26/article-2529521-1A4B717900000578-170_306x423.jpg",
      		"http://wp.patheos.com.s3.amazonaws.com/blogs/filmchat/files/2014/03/noah-ham-300x210.jpg",
      		"http://1.bp.blogspot.com/-H9PESxlL1o0/UoUS77Gi-OI/AAAAAAAAB4I/-Rf8smwG14A/s1600/noah+1.jpg",
      		"https://pmcvariety.files.wordpress.com/2014/03/noah-6.jpg",
      		"http://i2.cdnds.net/14/14/618x411/movies-noah-uk-premiere-cast-and-crew.jpg",
      		"http://i26.photobucket.com/albums/c124/Rachael89/small_zps1a72ed28.jpg",
      		"http://i.telegraph.co.uk/multimedia/archive/02856/PG-Noah-family_2856775b.jpg",
      		"http://static.gamesradar.com/images/totalfilm/n/noah-2-cast-chat-potential-sequel-ideas-159946-a-1396363068-470-75.jpg",
      		"http://rickihobson.files.wordpress.com/2014/04/video-undefined-196a7f3b00000578-247_636x358.jpg",
      		"http://www.cinephiled.com/wp-content/uploads/2014/03/noah-cast.jpg",
      		"http://cdn.screenrant.com/wp-content/uploads/Noah-Movie-Russell-Crowe-Ray-Winstone.jpg",
      		"http://media.indiatimes.in/media/content/2014/Mar/noah-movie-2014-images_1395987592_1395987596.jpg",
      		"http://4.bp.blogspot.com/-YJJ_9hhf1uM/U7sASarG2uI/AAAAAAAAAak/jfyVpnmO2kE/s1600/fdd87f15d219feed0ac61c56fd6ab309+%281%29.jpg",
      		"http://d157ea5e5b82458cb4a1-058f2dc3dab4356bddef23bc9ce1bcad.r81.cf3.rackcdn.com/916872553-Noah-2014-Russell-Crowe.jpg",
      		"https://41.media.tumblr.com/a4d3ace0e97facc4d496887439521669/tumblr_mytxfz0nry1rbav4zo1_500.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTM5NzY5MTAzOF5BMl5BanBnXkFtZTgwMzg2MTM0MTE@._V1_SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjA1ODk1NDQ0N15BMl5BanBnXkFtZTgwNzg2MTM0MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjE1MDAxMTY4NF5BMl5BanBnXkFtZTgwOTk2MTM0MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNDE1MTkzNzc0MF5BMl5BanBnXkFtZTgwMjYxNDEyMjE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNjA5MTIxNjM2M15BMl5BanBnXkFtZTgwMTkzNjkxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNjA2MDY1NjU5NF5BMl5BanBnXkFtZTgwMzkzNjkxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjE0MDM4OTk3Nl5BMl5BanBnXkFtZTgwNzI2MjgxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTc5MDk2ODYyNF5BMl5BanBnXkFtZTgwODI2MjgxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjE5MDM4NTc2Ml5BMl5BanBnXkFtZTgwMzQ2MjgxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTY2MjM3NjM3OV5BMl5BanBnXkFtZTgwMzU2MjgxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjI2OTgyNTc0Ml5BMl5BanBnXkFtZTgwNDM1NTQxMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjAzMzg0MDA3OF5BMl5BanBnXkFtZTgwNTMzOTYwMTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BNjg3NzQyMDQwN15BMl5BanBnXkFtZTgwNDE3MTM0MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTU4OTgyMTk2M15BMl5BanBnXkFtZTgwMTE3MTM0MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMTkzMzIwNTc0Ml5BMl5BanBnXkFtZTgwMjE3MTM0MTE@._V1__SX640_SY720_.jpg",
      		"http://ia.media-imdb.com/images/M/MV5BMjA2OTkwMzE0N15BMl5BanBnXkFtZTgwOTA3MTM0MTE@._V1__SX640_SY720_.jpg",
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
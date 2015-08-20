<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */

$ITEM_COLUMNS = array('type', 'route', 'folder', 'image', 'title', 'year');
class mainActions extends sfActions
{ 
    
    public function preExecute()
    {
    }
  
    public function executeHome(sfWebRequest $request)
    {
        global $ITEM_COLUMNS;
    		$arr = array();
    		$arr['movie']  		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'movie', 'limit'=>12));
    		$arr['soap'] 		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'soap', 'limit'=>12));
    		$arr['series'] 		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'series', 'limit'=>12));
    		$arr['tvshow'] 		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'tvshow', 'limit'=>12));
    		$arr['mn']     		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'mn', 'limit'=>12));
    		$arr['nonfiction']   = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'nonfiction', 'limit'=>12));
    		$arr['game'] 		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('type'=>'game', 'limit'=>12));
        $this->arr = $arr;
    }   
    

    public function executeSearch(sfWebRequest $request)
    {
        global $ITEM_COLUMNS;
        $s = GlobalLib::clearInput($request->getParameter('search'));
    		$this->setLayout(false);
        $rss  		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('s'=>$s, 'limit'=>20));
        return $this->renderPartial('partial/searchResult', array('rss'=>$rss));
    }
    
    # BEGIN OF PAGE
    public function executeAbout(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'about'));
    }
    
    public function executeAdvertisement(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'advertisement'));
    }
		
    public function executePrivacy(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'privacy'));
    }
    
    public function executeTerms(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'terms'));
    }
    
    public function executeHowtorate(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'howtorate'));
    }
    
    public function executeCopyright(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'copyright'));
    }
    
    public function executeCooperate(sfWebRequest $request)
    {	
        $this->rs = PageTable::getInstance()->doFetchOne(array('*'), array('type'=>'cooperate'));
    }
        
    public function executeContact(sfWebRequest $request)
    {
    		$form = new FeedbackForm();
    		if($request->isMethod(sfRequest::POST)) {
    				$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
			      if ($form->isValid()) {
                $feedback = new Feedback();
			          $feedback->setOrganization(GlobalLib::clearOutput($form->getValue('organization')));
			          $feedback->setName(GlobalLib::clearOutput($form->getValue('name')));
			          $feedback->setEmail(GlobalLib::clearOutput($form->getValue('email')));
			          $feedback->setPhone(GlobalLib::clearOutput($form->getValue('phone')));
			          $feedback->setMessage(GlobalLib::clearOutput($form->getValue('message')));
			          $feedback->save();
    					  $body = $this->getPartial("partial/mailFeedback", array('rs'=>$feedback));
    					  $message = $this->getMailer()->compose(
    					  						$feedback->getEmail(), 
    					  						sfConfig::get('app_feedback_mail'), 
    					  						sfConfig::get('app_domain').' ~ feedback', 
    					  						$body);
    					  try {
		    					  $this->getMailer()->send($message);
    					  } catch (Exception $e) {}
			          $this->getUser()->setFlash('flash', 'Таны захидлыг амжилттай илгээлээ.', true);
			          $this->redirect('main/contact');
			      }
    		} else {
            $this->getResponse()->setTitle(sfConfig::get('app_webname').' | Холбоо барих');
    		}
			  $this->form = $form;
    }
    # EO PAGE
    
    public function execute404(sfWebRequest $request)
    {
        
    }

    public function executeTmp(sfWebRequest $request)
    {
    		$org = file_get_contents("http://www.imdb.com/title/tt0060196/?ref_=chttp_tt_6");
    		
        //echo 
        $rs = new Item();
        $rs->setType('movie');
        // title
        /*$tmp = explode('<span class="itemprop" itemprop="name">', $org);
    		$tmp = explode('</span>', $tmp[1]);
        $rs->setTitle($tmp[0]);
        echo $rs->getTitle(); die();*/
        // genre

        // duration - <time itemprop="duration" datetime="PT133M">133 min</time>
        $tmp = explode('<time itemprop="duration" datetime="PT133M">', $org);
    		$tmp = explode('</time>', $tmp[1]);
    		echo $tmp[0]; die();
    		//echo str_replace(' min', '', $tmp[0]); die();
    		

        // release date
        /*$tmp = explode('"See all release dates"', $org);
    		$tmp = explode('meta itemprop="datePublished"', $tmp[1]);
    		echo $tmp[0];die();*/
    		$rs->setYear($tmp[0]);
    		echo $rs->getYear(); die();
        
        /*
        $rs->setGenre('');
        $rs->setYear();
        $rs->setYearEnd();
        $rs->setRoute(GlobalLib::slugify(GlobalLib::mn2en($rs->getTitle().'-'.$rs->getYear())));
        $rs->setImage();
        $rs->setSummary();
        $rs->setBody();
        $rs->setTrailer();
        $rs->setRating();
        $rs->setDuration();
        $rs->setAge();
        $rs->setStudios();
        $rs->setDirector();
        $rs->setWriter();
        $rs->setOfficialLink1();
        $rs->setOfficialLink2();
        $rs->setReleaseDate();
        $rs->setCasts();
        $rs->setBoxoffice();
        $rs->setThisweek();
        $rs->setComingsoon();
        $rs->setSource('imdb.com');
        $rs->setIsActive(1);
        $rs->setCreatedAid(1);
        $rs->save();*/
        echo 'success'; die();
    }

}

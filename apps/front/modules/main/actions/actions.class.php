<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class mainActions extends sfActions
{

    public function preExecute()
    {
    }
  
    public function executeHome(sfWebRequest $request)
    {
    		$arr = array();
    		$arr['movie']  		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('type'=>'movie', 'limit'=>15));
    		$arr['series'] 		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('type'=>'series', 'limit'=>15));
    		$arr['tvshow'] 		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('type'=>'tvshow', 'limit'=>15));
    		$arr['mn']     		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('type'=>'mn', 'limit'=>15));
    		$arr['nonfiction'] = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('type'=>'nonfiction', 'limit'=>15));
        $this->arr = $arr;
        
        $this->loves = GlobalTable::doFetchSelection('Love', 'object_id', array('object_id'), array('objectType'=>'item', 'isActive'=>-1));
    }   
    

    public function executeSearch(sfWebRequest $request)
    {
        $this->setLayout(false);
        $s = GlobalLib::clearInput($request->getParameter('search'));
        $arr = array();
        $arr['movie']  		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('sItem'=>$s, 'type'=>'movie', 'limit'=>15));
    		$arr['series'] 		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('sItem'=>$s, 'type'=>'series', 'limit'=>15));
    		$arr['tvshow'] 		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('sItem'=>$s, 'type'=>'tvshow', 'limit'=>15));
    		$arr['mn']     		 = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('sItem'=>$s, 'type'=>'mn', 'limit'=>15));
    		$arr['nonfiction'] = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), array('sItem'=>$s, 'type'=>'nonfiction', 'limit'=>15));
        return $this->renderPartial('partial/searchResult', array('arr'=>$arr));
    }
    
    public function executeContact(sfWebRequest $request)
    {	
    		$form = new FeedbackForm();
    		if($request->isMethod(sfRequest::POST)) {
    				$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
			      if ($form->isValid()) {
			          $feedback = $form->save();
			          // send mail to hello@mmdb.mn
    					  $body = $this->getPartial("mail/feedback", array('rs'=>$feedback));
    					  $message = $this->getMailer()->compose($feedback->getEmail(), sfConfig::get('app_feedbackmail'), 'mmdb.mn feedback', $body);
    					  $this->getMailer()->send($message);
                //$this->sendMail(sfConfig::get('app_feedbackmail'), 'mmdb.mn feedback', $body);
			          $this->getUser()->setFlash('flash', 'Таны захидлыг амжилттай илгээлээ.', true);
			          $this->redirect('page/contact');
			      }
    		} else {
            $this->getResponse()->setTitle(sfConfig::get('app_webname').' | Холбоо барих');
    		}
			  $this->form = $form;
    }
    
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

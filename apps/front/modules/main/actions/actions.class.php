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
        $rss  		 = ItemTable::getInstance()->doFetchArray(array($ITEM_COLUMNS), array('s'=>$s, 'limit'=>20));
        $this->setLayout(false);
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
        echo 'success'; die();
    }

}

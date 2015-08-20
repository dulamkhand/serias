<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class partial1Actions extends sfActions
{
  public function preExecute()
  {
  }
  
  public function executeNewsShow(sfWebRequest $request)
  {
      $this->rs = $rs = Doctrine::getTable('News')->find(array($request->getParameter('id')));
      $this->forward404Unless($rs);
      
      // set nb_views
      $rs->setNbViews($rs->getNbViews()+1);
      $rs->save();
      
      // add to viewed news in the session
      $vieweds = $this->getUser()->getAttribute('viewed-news-'.$this->getUser()->getId(), array());
      $vieweds[$rs->getId()] = $rs;
      $this->getUser()->setAttribute('viewed-news-'.$this->getUser()->getId(), $vieweds);
      
      // META
      $meta = sfConfig::get('app_webname').' | '.$rs;
      $this->getResponse()->setTitle($meta);
      $this->getResponse()->addMeta('description', $meta);
      $this->getResponse()->addMeta('keywords', $meta);
  }

  public function executeBests(sfWebRequest $request)
  {
  		$this->bestType = $bestType = $request->getParameter('bestType');
  		$this->rss = $rss = BestsTable::getInstance()->doExecute(array('*'), array('bestType'=>$bestType, 'orderBy'=>'number asc'));
  		
  		// META
      $meta = sfConfig::get('app_webname').' | '.GlobalLib::getValue('bests', $bestType);
      $this->getResponse()->setTitle($meta);
      $this->getResponse()->addMeta('description', $meta);
      $this->getResponse()->addMeta('keywords', $meta);
  }
  
}	
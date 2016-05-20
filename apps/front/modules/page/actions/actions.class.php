<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */

$ITEM_COLUMNS = 'type, route, folder, image, title, year';
class pageActions extends sfActions
{

    public function preExecute()
    {
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        global $ITEM_COLUMNS;
        $params = array();
        $params['limit'] = 40;
        $params['type'] = $request->getParameter('type');
        $params['y'] = $request->getParameter('y');
        $params['l'] = $request->getParameter('l');
        $params['g'] = $request->getParameter('g');
        if($request->getParameter('isWatchOnline')) $params['isWatchOnline'] = '1';
        if($request->getParameter('isTorrentDownload')) $params['isTorrentDownload'] = '1';
        if($request->getParameter('isMongolianLanguage')) $params['isMongolianLanguage'] = '1';
        $this->pager = ItemTable::getInstance()->getPager($ITEM_COLUMNS, $params, $request->getParameter('page'));
        //$this->loves = LoveTable::getInstance()->doFetchSelection('object_id', array('object_id'), array('objectType'=>'item', 'isActive'=>-1));
    }
  
    public function executeShow(sfWebRequest $request)
    {
        $this->rs = $rs = ItemTable::getInstance()->doFetchOne('*', array('route'=>$request->getParameter('route')));
        $this->forward404Unless($rs);
        
        // set nb_views
        $rs->setNbViews($rs->getNbViews()+1);
        $rs->save();
        
        //$this->loves = ItemTable::getInstance()->doFetchSelection('object_id', array('object_id'), array('objectType'=>'item', 'isActive'=>-1));
        
        // add to viewed movies in the session
        $vieweds = $this->getUser()->getAttribute('viewed-movies-'.$this->getUser()->getId(), array());
        $vieweds[$rs->getId()] = $rs;
        $this->getUser()->setAttribute('viewed-movies-'.$this->getUser()->getId(), $vieweds);
        
        // META
        $meta = sfConfig::get('app_webname').' | '.$rs;
        $this->getResponse()->setTitle($meta);
        $this->getResponse()->addMeta('description', $meta);
        $this->getResponse()->addMeta('keywords', $meta);
				$this->setLayout('layoutShow');
    }
    
    public function executeIframe(sfWebRequest $request)
    {
        return $this->renderPartial('partial/iframe', array('link'=>$request->getParameter('link')));
    }

}

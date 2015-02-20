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
class pageActions extends sfActions
{

    public function preExecute()
    {
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        global $ITEM_COLUMNS;
        $params = array();
        $params['type'] = $request->getParameter('type');
        $params['y'] = $request->getParameter('y');
        $params['l'] = $request->getParameter('l');
        $params['g'] = $request->getParameter('g');
        if($request->getParameter('isWatchOnline')) $params['isWatchOnline'] = '1';
        if($request->getParameter('isTorrentDownload')) $params['isTorrentDownload'] = '1';
        if($request->getParameter('isMongolianLanguage')) $params['isMongolianLanguage'] = '1';
        $this->pager = GlobalTable::getPager('Item', $ITEM_COLUMNS, $params, $request->getParameter('page'));
        $this->loves = GlobalTable::doFetchSelection('Love', 'object_id', array('object_id'), array('objectType'=>'item', 'isActive'=>-1));
    }
    
    public function executeBests(sfWebRequest $request)
    {
    		$this->bestType = $bestType = $request->getParameter('bestType');
    		$this->rss = $rss = GlobalTable::doExecute('Bests', array('*'), array('bestType'=>$bestType, 'orderBy'=>'number asc'));
    }
  
    public function executeShow(sfWebRequest $request)
    {
        //$this->rs = $rs = Doctrine::getTable('Item')->findOneBy('route', $request->getParameter('route'));
        $this->rs = $rs = GlobalTable::doFetchOne('Item', array('*'), array('route'=>$request->getParameter('route')));
        $this->forward404Unless($rs);
        
        // set nb_views
        $rs->setNbViews($rs->getNbViews()+1);
        $rs->save();
        
        
        $this->loves = GlobalTable::doFetchSelection('Love', 'object_id', array('object_id'), array('objectType'=>'item', 'isActive'=>-1));
        
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

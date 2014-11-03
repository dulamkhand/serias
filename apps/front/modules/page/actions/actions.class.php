<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class pageActions extends sfActions
{

    public function preExecute()
    {
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward404Unless(in_array($this->type = $type = $request->getParameter('type'), GlobalLib::getKeys('type')));
        $params = array();
        $params['type'] = $type;
        $params['y'] = $request->getParameter('y');
        $params['l'] = $request->getParameter('l');
        $params['g'] = $request->getParameter('g');
        $this->pager = GlobalTable::getPager('Item', $params, $request->getParameter('page'));
    }
  
    public function executeShow(sfWebRequest $request)
    {
        $this->rs = $rs = Doctrine::getTable('Item')->findOneBy('route', $request->getParameter('route'));
        $this->forward404Unless($rs);
        
        // META
        $meta = sfConfig::get('app_webname').' | '.$rs;
        $this->getResponse()->setTitle($meta);
        $this->getResponse()->addMeta('description', $meta);
        $this->getResponse()->addMeta('keywords', $meta);
    }
    
    public function executeIframe(sfWebRequest $request)
    {
        return $this->renderPartial('partial/iframe', array('link'=>$request->getParameter('link')));
    }

}

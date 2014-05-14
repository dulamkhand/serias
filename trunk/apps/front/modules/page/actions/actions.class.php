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
        $this->pager = GlobalTable::getPager('Item', array('type'=>$type), $request->getParameter('page'));
    }
  
    public function executeShow(sfWebRequest $request)
    {
        $this->rs = $rs = Doctrine::getTable('Item')->findOneBy('route', $request->getParameter('route'));
        $this->forward404Unless($rs);
    }
    
    public function executeIframe(sfWebRequest $request)
    {
        return $this->renderPartial('partial/iframe', array('link'=>$request->getParameter('link')));
    }

}

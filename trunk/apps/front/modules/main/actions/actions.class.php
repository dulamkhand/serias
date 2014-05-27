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
        $rss = Doctrine::getTable('Item')->createQuery()->orderBy('sort ASC, created_at DESC')->fetchArray();
        foreach ($rss as $rs) {
            $arr[$rs['type']][] = $rs;
        }
        $this->arr = $arr;
    }   
    
    public function execute404(sfWebRequest $request)
    {
    }
    
    public function executeSearch(sfWebRequest $request)
    {
        $this->setLayout(false);
        $arr = array();
        $rss = GlobalTable::doFetchArray('Item', array('sItem'=>GlobalLib::clearInput($request->getParameter('a'))));
        foreach ($rss as $rs) {
            $arr[$rs['type']][] = $rs;
        }
        return $this->renderPartial('partial/searchResult', array('arr'=>$arr));
    }
    
    public function executeTmp(sfWebRequest $request)
    {
        echo 'success'; die();
    }

}

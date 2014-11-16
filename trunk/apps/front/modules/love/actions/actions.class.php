<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class loveActions extends sfActions
{
    public function executeToggle(sfWebRequest $request)
    {
        if($request->getParameter('act') == 'love') {
            $love = new Love();
            $love->setObjectId($request->getParameter('itemId'));
            $love->setObjectType('item');
            $love->setUserId($this->getUser()->getId());
            $love->setIpAddress($request->getRemoteAddress());
            $love->save();  
        } elseif ($request->getParameter('act') == 'unlove') {
            Doctrine_Query::create()->delete()->from('Love')
                ->where('object_id = ?', $request->getParameter('itemId'))
                ->andWhere('object_type = ?', 'item')
                ->execute();
        }
  
        $this->setLayout(false);
        $this->setTemplate(false);
        return $this->renderText("");
    }
    

}
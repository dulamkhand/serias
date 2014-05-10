<?php

/**
 * link actions.
 *
 * @package    vogue
 * @subpackage link
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class linkActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        $params['itemId'] = $request->getParameter('itemId');
        $params['orderBy'] = 'season ASC, episode ASC, created_at DESC, updated_at DESC';
        if($request->getParameter('s')) $params['sLink'] = $request->getParameter('s');
        $this->pager = GlobalTable::getPager('Link', $params, $request->getParameter('page'));
        
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->forward404Unless($itemId = $request->getParameter('itemId'));
        $this->form = new LinkForm(null, array('itemId'=>$itemId));
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        $data = $request->getParameter('link');
        $this->forward404Unless($itemId = $data['item_id']);

        $this->form = new LinkForm(null, array('itemId'=>$itemId));
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Link')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new LinkForm($rs, array('itemId'=>$rs->getItemId()));
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Link')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new LinkForm($rs, array('itemId'=>$rs->getItemId()));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Link')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'link/index');
    }
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $rs->setRoute(GlobalLib::slugify(GlobalLib::mn2en($rs->getTitle().'-'.$rs->getSeason().'-'.$rs->getEpisode().'-'.$rs->getId())));
            $rs->save();

            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('link/index?itemId='.$rs->getItemId());
        }
    }


}

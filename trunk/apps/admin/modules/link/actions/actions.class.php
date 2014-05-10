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
        if($request->getParameter('s')) $params['sLink'] = $request->getParameter('s');
        $this->pager = GlobalTable::getPager('Link', $params, $request->getParameter('page'));
        
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new LinkForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new LinkForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Link')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new LinkForm($rs);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Link')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new LinkForm($rs);
    
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
            
            if($rs->getTitle()) {
                $rs->setRoute(GlobalLib::mn2en($rs->getTitle()));
                $rs->save();
            }

            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('link/index');
        }
    }


}

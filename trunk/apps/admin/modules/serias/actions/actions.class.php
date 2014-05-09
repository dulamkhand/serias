<?php

/**
 * serias actions.
 *
 * @package    vogue
 * @subpackage serias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seriasActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        if($request->getParameter('s')) $params['sSerias'] = $request->getParameter('s');
        $this->pager = GlobalTable::getPager('Serias', $params, $request->getParameter('page'));
        
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new SeriasForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new SeriasForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Serias')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new SeriasForm($rs);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Serias')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new SeriasForm($rs);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Serias')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'serias/index');
    }
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            
            if($rs->getTitle()) {
                $rs->setRoute(GlobalLib::slugify($rs->getTitle()));
                $rs->save();
            }
            
            GlobalLib::createThumbs($rs->getImage(), 'serias', array(200), true);

            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('serias/index');
        }
    }


}

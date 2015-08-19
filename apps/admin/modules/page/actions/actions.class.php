<?php

/**
 * page actions.
 *
 * @package    zzz
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{  
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('page'), 'admin', 'perm');  
    }
  
    public function executeIndex(sfWebRequest $request) 
    {
        $params = array();
        $params['isActive'] = 'all';
        if($request->getParameter('s')) $params['sPage'] = $request->getParameter('s');
        $this->pager = PageTable::getInstance()->getPager(array('*'), $params, $request->getParameter('page'));
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PageForm();
        $this->setTemplate('edit');
    }
  
    
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new PageForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($page = Doctrine::getTable('Page')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new PageForm($page, array());
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($page = Doctrine::getTable('Page')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new PageForm($page, array());
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
    
    public function executeActivate(sfWebRequest $request)
      {
          $this->forward404Unless($content = Doctrine::getTable('Page')->find($request->getParameter('id')));
          $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
          $content->setIsActive($cmd);
          $content->save();
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect($request->getReferer() ? $request->getReferer() : 'page/index');
      }
  
  
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $page = $form->save();
            $page->setUpdatedAt(date('Y-m-d H:i:s'));
            $page->save();
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('page/index');
        }
    }

}
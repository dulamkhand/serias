<?php

/**
 * studio actions.
 *
 * @package    broadway
 * @subpackage studio
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studioActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('studio'), 'admin', 'perm');  
  }
  
  public function executeIndex(sfWebRequest $request)
  {
      $params = array();
      $params['isActive'] = 'all';
      $params['s'] = $request->getParameter('s');
      $this->pager = StudioTable::getInstance()->getPager('*', $params, $request->getParameter('page'));
  }
  
  
  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($studio = Doctrine::getTable('Studio')->find($request->getParameter('id')));
    $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));

    $studio->setIsActive($cmd);
    $studio->save();
    $this->getUser()->setFlash('flash', 'Successfully saved.', true);

    $this->redirect('studio/index');
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StudioForm();
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StudioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($studio = Doctrine::getTable('Studio')->find(array($request->getParameter('id'))), sprintf('Object studio does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudioForm($studio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($studio = Doctrine::getTable('Studio')->find(array($request->getParameter('id'))), sprintf('Object studio does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudioForm($studio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($studio = Doctrine::getTable('Studio')->find(array($request->getParameter('id'))), sprintf('Object studio does not exist (%s).', $request->getParameter('id')));
    $studio->delete();
    $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
    $this->redirect('studio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $studio = $form->save();
          $studio->setUpdatedAt(date('Y-m-d H:i:s'));
          $studio->save();
          
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('studio/index');
      }
  }
  
}
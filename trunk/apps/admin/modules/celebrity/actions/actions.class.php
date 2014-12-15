<?php

/**
 * celebrity actions.
 *
 * @package    broadway
 * @subpackage celebrity
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class celebrityActions extends sfActions
{
  function preExecute() {
      //$this->forwardUnless($this->getUser()->hasCredential('celebrity'), 'admin', 'perm');  
  }
  
  public function executeIndex(sfWebRequest $request)
  {
      $params = array();
      $params['isActive'] = 'all';
      if($request->getParameter('sCelebrity')) $params['s'] = $request->getParameter('s');
      $this->pager = GlobalTable::getPager('Celebrity', array('*'), $params, $request->getParameter('page'));
  }
  
  
  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($celebrity = Doctrine::getTable('Celebrity')->find($request->getParameter('id')));
    $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));

    $celebrity->setIsActive($cmd);
    $celebrity->save();
    $this->getUser()->setFlash('flash', 'Successfully saved.', true);

    $this->redirect('celebrity/index');
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CelebrityForm();
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CelebrityForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($celebrity = Doctrine::getTable('Celebrity')->find(array($request->getParameter('id'))), sprintf('Object celebrity does not exist (%s).', $request->getParameter('id')));
    $this->form = new CelebrityForm($celebrity);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($celebrity = Doctrine::getTable('Celebrity')->find(array($request->getParameter('id'))), sprintf('Object celebrity does not exist (%s).', $request->getParameter('id')));
    $this->form = new CelebrityForm($celebrity);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($celebrity = Doctrine::getTable('Celebrity')->find(array($request->getParameter('id'))), sprintf('Object celebrity does not exist (%s).', $request->getParameter('id')));
    try {
      $celebrity->delete();
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
    }catch (Exception $e){}
    $this->redirect('celebrity/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $celebrity = $form->save();
          $celebrity->setUpdatedAt(date('Y-m-d H:i:s'));
          $celebrity->save();
          
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('celebrity/index');
      }
  }
  
}
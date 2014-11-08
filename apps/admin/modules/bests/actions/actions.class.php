<?php

/**
 * admin actions.
 *
 * @package    zzz
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bestsActions extends sfActions
{
	  public function executePerm() {
	      $this->getUser()->setFlash('flash', 'Permission denied!', true);
	  }
	  
	  public function executeIndex(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $params = array();
	      if($request->getParameter('best_type')) $params['best_type'] = $request->getParameter('best_type');
        if($request->getParameter('s')) $params['sBests'] = $request->getParameter('s');
	      $this->pager = GlobalTable::getPager('Bests', array('*'), $params, $request->getParameter('page'));
	  }
	  
	  public function executeLoadItems(sfWebRequest $request) {
	  		
	      $this->setLayout(false);
	  }
	
	  public function executeNew(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $this->form = new BestsForm();
	      $this->setTemplate('edit');
	  }
	  
	  public function executeCreate(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $this->forward404Unless($request->isMethod(sfRequest::POST));
	      $this->form = new BestsForm();
	      $this->processForm($request, $this->form);
	      $this->setTemplate('edit');
	  }
	
	  public function executeEdit(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $this->forward404Unless($rs = Doctrine::getTable('Bests')->find(array($request->getParameter('id'))), sprintf('Object bests does not exist (%s).', $request->getParameter('id')));
	      $this->form = new BestsForm($rs);
	  }
	
	  public function executeUpdate(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
	      $this->forward404Unless($rs = Doctrine::getTable('Bests')->find(array($request->getParameter('id'))), sprintf('Object bests does not exist (%s).', $request->getParameter('id')));
	      $this->form = new BestsForm($rs);
	      $this->processForm($request, $this->form);
	      $this->setTemplate('edit');
	  }
	  
	  public function executeDelete(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $this->forward404Unless($rs = Doctrine::getTable('Bests')->find(array($request->getParameter('id'))), sprintf('Object bests does not exist (%s).', $request->getParameter('id')));
	      try {
	          $rs->delete();
	          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
	      } catch (Exception  $e){}
	      $this->redirect('bests/index');
	  }

	  protected function processForm(sfWebRequest $request, sfForm $form) {
	      $this->forwardUnless($this->getUser()->hasCredential('bests'), 'admin', 'perm');
	      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	      if ($form->isValid()) {
	          $rs = $form->save();
	          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
	          $this->redirect('bests/index');
	      }
	  }


}
<?php

/**
 * admin actions.
 *
 * @package    zzz
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cinemaActions extends sfActions
{
	  public function executePerm() {
	      $this->getUser()->setFlash('flash', 'Permission denied!', true);
	  }
	  
	  public function executeIndex(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $params = array();
	      $params['isAcrive'] = 'all';
	      if($request->getParameter('cinema')) $params['cinema'] = $request->getParameter('cinema');
        if($request->getParameter('s')) $params['sCinema'] = $request->getParameter('s');
	      $this->pager = GlobalTable::getPager('Cinema', array('*'), $params, $request->getParameter('page'));
	  }
	  
	  public function executeItemsOptions(sfWebRequest $request) {
	  		$this->rss = GlobalTable::doFetchSelectionItem('Item', array('sItem'=>$request->getParameter('s')));
	  		$this->itemId = $request->getParameter('itemId');
	      $this->setLayout(false);
	  }
	
	  public function executeNew(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $this->form = new CinemaForm();
	      $this->setTemplate('edit');
	  }
	  
	  public function executeCreate(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $this->forward404Unless($request->isMethod(sfRequest::POST));
	      $this->form = new CinemaForm();
	      $this->processForm($request, $this->form);
	      $this->setTemplate('edit');
	  }
	
	  public function executeEdit(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $this->forward404Unless($rs = Doctrine::getTable('Cinema')->find(array($request->getParameter('id'))), sprintf('Object cinema does not exist (%s).', $request->getParameter('id')));
	      $this->form = new CinemaForm($rs);
	  }
	
	  public function executeUpdate(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
	      $this->forward404Unless($rs = Doctrine::getTable('Cinema')->find(array($request->getParameter('id'))), sprintf('Object cinema does not exist (%s).', $request->getParameter('id')));
	      $this->form = new CinemaForm($rs);
	      $this->processForm($request, $this->form);
	      $this->setTemplate('edit');
	  }
	  
	  public function executeDelete(sfWebRequest $request) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $this->forward404Unless($rs = Doctrine::getTable('Cinema')->find(array($request->getParameter('id'))), sprintf('Object cinema does not exist (%s).', $request->getParameter('id')));
	      try {
	          $rs->delete();
	          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
	      } catch (Exception  $e){}
	      $this->redirect('cinema/index');
	  }

	  protected function processForm(sfWebRequest $request, sfForm $form) {
	      $this->forwardUnless($this->getUser()->hasCredential('cinema'), 'admin', 'perm');
	      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	      if ($form->isValid()) {
	          $rs = $form->save();
	          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
	          $this->redirect('cinema/index');
	      }
	  }


}
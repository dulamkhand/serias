<?php

/**
 * banner actions.
 *
 * @package    broadway
 * @subpackage banner
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannerActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('banner'), 'admin', 'perm');  
  }
  
  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = BannerTable::getInstance()->getPager('*', array('isActive'=>'all', 'position'=>$position, 'orderBy'=>'position ASC, sort DESC'), $request->getParameter('page'));
  }
  
  
  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find($request->getParameter('id')));
    $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));

    $banner->setIsActive($cmd);
    $banner->save();
    $this->getUser()->setFlash('flash', 'Successfully saved.', true);

    $this->redirect('banner/index');
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BannerForm();
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BannerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerForm($banner);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerForm($banner);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
      
    try {
      $banner->delete();
      
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
    }catch (Exception $e){}
    
    $this->redirect('banner/index');
    
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $banner = $form->save();
          if($form->getValue('start_date') || $form->getValue('end_date')) {
              $tmp = $form->getValue('start_date');
              $banner->setStartDate($tmp['year'].'-'.$tmp['month'].'-'.$tmp['day']);
              $tmp = $form->getValue('end_date');
              $banner->setEndDate($tmp['year'].'-'.$tmp['month'].'-'.$tmp['day']);
          }
          if($form->getValue('path')) {
              $banner->setRoute(GlobalLib::slugify($banner->getPath()));
              $ext = GlobalLib::getFileExtension($banner->getPath());
              $banner->setExt($ext);
          }
          $banner->setUpdatedAt(date('Y-m-d H:i:s'));
          $banner->save();
          
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('banner/index');
      }
  }
  
}
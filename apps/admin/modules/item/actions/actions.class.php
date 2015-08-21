<?php

/**
 * item actions.
 *
 * @package    vogue
 * @subpackage item
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        $params['isActive'] = 'all';
        if($request->getParameter('type')) $params['type'] = $request->getParameter('type');        
        if($request->getParameter('caid')) $params['createdAid'] = trim($request->getParameter('caid'));
        $params['s'] = trim($request->getParameter('s'));
        $this->pager = ItemTable::getInstance()->getPager(array('*'), $params, $request->getParameter('page'));
        
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ItemForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ItemForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Item')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ItemForm($rs);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Item')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ItemForm($rs);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    /** not used yet
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Item')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'item/index');
    }*/
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $rs->setGenre(join(";", $request->getParameter('genres')));
            // image
            GlobalLib::createThumbs($rs->getImage(), $rs->getFolder(), array(140));
            if($rs->getImage() && file_exists(sfConfig::get('sf_upload_dir').'/'.$rs->getFolder().'/'.$rs->getImage())) {
            		// create waterlink
		            $filepath = sfConfig::get('sf_upload_dir').'/'.$rs->getFolder().'/'.$rs->getImage();
		            $img = new sfImage($filepath);
		            $img->overlay(new sfImage(sfConfig::get('sf_web_dir').'/images/watermark200.png'), 'bottom-right');
		            $img->saveAs($filepath);
            }
            
            // title
            $rs->setTitle(trim($rs->getTitle()));
            $rs->setTitleMn(trim($rs->getTitleMn()));
            if($rs->getTitle()) {
                $rs->setRoute(GlobalLib::slugify(GlobalLib::mn2en($rs->getTitle().'-'.$rs->getYear())));
            }
            $rs->setSummary(trim($rs->getSummary()));
            $rs->setSummaryMn(trim($rs->getSummaryMn()));
            $rs->setBody(trim($rs->getBody()));
            $rs->setBodyMn(trim($rs->getBodyMn()));
            $rs->setTrailer(trim($rs->getTrailer()));
            $rs->setRating(trim($rs->getRating()));
            $rs->setKickass(trim($rs->getKickass()));
            $rs->setDuration(trim($rs->getDuration()));
            $rs->setAge(trim($rs->getAge()));
            $rs->setOfficialLink1(trim($rs->getOfficialLink1()));
            $rs->setOfficialLink2(trim($rs->getOfficialLink2()));
            $rs->setSource(trim($rs->getSource()));
            $rs->save();
            
            // casts
            $rs->setCasts(trim($rs->getCasts()));
            $tmp = explode(',', $rs->getCasts());
            foreach($tmp as $t) {
                $t = explode('(', $t);
                $route = GlobalLib::slugify(GlobalLib::mn2en(trim($t[0])));
            		if($route && !CelebrityTable::getInstance()->doFetchOne(array('id'), array('route'=>$route, 'isActive'=>'all'))) {
            				$c = new Celebrity();
            				$c->setFullname(trim($t[0]));
            				$c->setRoute($route);
            				$c->setCreatedAid($this->getUser()->getId());
            				$c->setUpdatedAid($this->getUser()->getId());
            				$c->setUpdatedAt(date('Y-m-d  H:i:s'));
            				$c->save();
            		}
            }
            // director
            $rs->setDirector(trim($rs->getDirector()));
            $tmp = explode(',', $rs->getDirector());
            foreach($tmp as $t) {
                $t = explode('(', $t);
                $route = GlobalLib::slugify(GlobalLib::mn2en(trim($t[0])));
            		if($route && !CelebrityTable::getInstance()->doFetchOne(array('id'), array('route'=>$route, 'isActive'=>'all'))) {
            				$c = new Celebrity();
            				$c->setFullname(trim($t[0]));
            				$c->setRoute($route);
            				$c->setCreatedAid($this->getUser()->getId());
            				$c->setUpdatedAid($this->getUser()->getId());
            				$c->setUpdatedAt(date('Y-m-d  H:i:s'));
            				$c->save();
            		}
            }
            // writer
            $rs->setWriter(trim($rs->getWriter()));
            $tmp = explode(',', $rs->getWriter());
            foreach($tmp as $t) {
                $t = explode('(', $t);
                $route = GlobalLib::slugify(GlobalLib::mn2en(trim($t[0])));
            		if($route && !CelebrityTable::getInstance()->doFetchOne(array('id'), array('route'=>$route, 'isActive'=>'all'))) {
            				$c = new Celebrity();
            				$c->setFullname(trim($t[0]));
            				$c->setRoute($route);
            				$c->setCreatedAid($this->getUser()->getId());
            				$c->setUpdatedAid($this->getUser()->getId());
            				$c->setUpdatedAt(date('Y-m-d  H:i:s'));
            				$c->save();
            		}
            }
            // studio
            $rs->setStudios(trim($rs->getStudios()));
            $tmp = explode(',', $rs->getStudios());
            foreach($tmp as $t) {
                $t = explode('(', $t);
                $route = GlobalLib::slugify(GlobalLib::mn2en(trim($t[0])));
            		if($route && !StudioTable::getInstance()->doFetchOne(array('id'), array('route'=>$route, 'isActive'=>'all'))) {
            				$c = new Studio();
            				$c->setName(trim($t[0]));
            				$c->setRoute($route);
            				$c->setCreatedAid($this->getUser()->getId());
            				$c->setUpdatedAid($this->getUser()->getId());
            				$c->setUpdatedAt(date('Y-m-d  H:i:s'));
            				$c->save();
            		}
            }

            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('item/index');
        }
    }


}

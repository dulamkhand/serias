<?php

/**
 * user actions.
 *
 * @package    vogue
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    public function preExecute(){
        
    }
    
    public function executeProfile(sfWebRequest $request)
    {      
        /*$id = $request->getParameter('id');
        if($this->getUser()->getAttribute('id') ==  $id) {
            $id = $this->getUser()->getAttribute('id');
        }*/
        $this->forward404Unless($this->user = $user = UserTable::getInstance()->doFetchOne('*', 
            			array('email'=>$this->getUser()->getAttribute('email'))));
            
        $this->pager = LoveTable::getInstance()->getPager('*', 
                  array('objectType'=>'item', 'userId'=>$this->getUser()->getId(), 'isActive'=>-1), 
                  $request->getParameter('page'));
    }
  
    public function executeSignin(sfWebRequest $request) 
    {
        $form = new LoginForm();
        
        if ($request->isMethod(sfRequest::POST)) {
            $form->bind($request->getParameter($form->getName())); 
            if ($form->isValid()) {
                $user = $form->getObject1();
                if($user instanceof User) {
                    // active user
                    if($user->getIsActive()) {
                        $this->getUser()->signIn($user);
                        $this->getUser()->setFlash('flash', 'Амжилттай нэвтэрлээ.', true); 
                        $this->redirect($request->getReferer() ? $request->getReferer() : url_for('user/profile'));
                    } else { // inactive user
                        if(!$user->getActivationCode()) {
                            $user->setActivationCode(md5(time()));
                            $user->save();  
                        }
                        // send mail TODO
                        /* $mailBody = $this->getPartial("mail/confirmRegistration", array('fullname'=>$user->getFullname(), 'code'=>$user->getActivationCode()));
                        $this->sendMail($user->getEmail(), 'Та бүртгэлээ идэвхижүүлнэ үү.', $mailBody);*/
                        $this->getUser()->setFlash('flash', "Та бүртгэлээ идэвхижүүлээгүй байна. Идэвхижүүлэх линк таны и-мэйл хаягруу илгээгдлээ.", true);
                    }
                }
						}
        }
        $this->form = $form;
    }
    
    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->signOut();
        $this->getUser()->setFlash('flash', 'Холболт амжилттай тасарлаа.', true);  
        $this->redirect('@homepage');
    }  
    
    public function executeSignup(sfWebRequest $request)
    {
        $form = new RegisterForm();
        
        if ($request->isMethod(sfRequest::POST)) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()){
                $user = $form->save();

                $inputFilter = new InputFilter();
                $user->setPassword(md5($user->getPassword()));
                $user->setIp($request->getRemoteAddress());
                $user->setUpdatedAt(date('Y-m-d H:i:s'));
                $code = md5(time());
                $user->setActivationCode($code);
                $user->save();
                
                // send mail TODO
                /* $mailBody = $this->getPartial("mail/confirmRegistration", array('fullname'=>$user->getFullname(), 'code'=>$code));
                $this->sendMail($user->getEmail(), 'Та бүртгэлээ идэвхижүүлнэ үү.', $mailBody);*/
                $this->getUser()->setFlash('flash', 'Амжилттай бүртгүүллээ. Таны имэйл хаягруу илгээсэн линк дээр дарж бүртгэлээ идэвхижүүлээрэй.', true);
                $this->redirect($request->getReferer() ? $request->getReferer() : url_for('user/signin'));                
            }
        }
        $this->form = $form;
    }
  
    public function executeForgot(sfWebRequest $request)
    {
        $form = new ForgotForm();
        
        if ($request->isMethod(sfRequest::POST)) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()){
                $user = $form->save();

                $inputFilter = new InputFilter();
                $user->setPassword(md5($user->getPassword()));
                $user->setIp($request->getRemoteAddress());
                $user->setUpdatedAt(date('Y-m-d H:i:s'));
                $code = md5(time());
                $user->setActivationCode($code);
                $user->save();
                
                // send mail TODO
                /* $mailBody = $this->getPartial("mail/confirmRegistration", array('fullname'=>$user->getFullname(), 'code'=>$code));
                $this->sendMail($user->getEmail(), 'Та бүртгэлээ идэвхижүүлнэ үү.', $mailBody);*/
                $this->getUser()->setFlash('flash', 'Амжилттай бүртгүүллээ. Таны имэйл хаягруу илгээсэн линк дээр дарж бүртгэлээ идэвхижүүлээрэй.', true);
                $this->redirect($request->getReferer() ? $request->getReferer() : url_for('user/signin'));                
            }
        }
        $this->form = $form;
    } 
    
    public function executeLoadmore(sfWebRequest $request)
    {
        $params = array();
        if($request->getParameter('authorId')) $params['authorId'] = $request->getParameter('authorId');
        $params['limit'] = 1;
        
    		$this->contents = $contents = Doctrine::getTable('Content')->doFetchArray($params);
        //if (!sizeof($contents)) return sfView::NONE;
        
        $this->setLayout(false);
    }


}

<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class commentActions extends sfActions
{
  public function preExecute()
  {
  }
  
  public function executeThumbsDown(sfWebRequest $request)
  {
  		$id = GlobalLib::clearInput($request->getParameter('commentId'));
  		if($this->getUser()->getAttribute('thumbed'.$id)) {
					return $this->renderText("");
  		}
			if($rs = Doctrine::getTable('Comment')->doFetchOne(array('*'), array('id'=>$id))) {
					$rs->setNbUnlike($rs->getNbUnlike()+1);
		      $rs->save();
		      $this->getUser()->setAttribute('thumbed'.$id, true);
					return $this->renderText($rs->getNbUnlike());
			}
			return $this->renderText("");
  }
  
  public function executeThumbsUp(sfWebRequest $request)
  {
  		$id = GlobalLib::clearInput($request->getParameter('commentId'));
  		if($this->getUser()->getAttribute('thumbed'.$id)) {
					return $this->renderText("");
  		}
			if($rs = Doctrine::getTable('Comment')->doFetchOne(array('*'), array('id'=>$id))) {
					$rs->setNbLike($rs->getNbLike()+1);
		      $rs->save();									
		      $this->getUser()->setAttribute('thumbed'.$id, true);
					return $this->renderText($rs->getNbLike());
			}
			return $this->renderText("");
  }

  public function executeSave(sfWebRequest $request)
  {
      $errorString = "Алдаа гарлаа. Та хэсэг хугацааны дараа дахин оролдоод үзнэ үү.";
      
      if($request->isMethod(sfRequest::POST))
      {
          $objectType = GlobalLib::clearInput($request->getParameter('commentObjectType'));
          $objectId = GlobalLib::clearInput($request->getParameter('commentObjectId'));
          $name = GlobalLib::clearInput($request->getParameter('commentName'));
          $text = GlobalLib::clearInput($request->getParameter('commentBody'));
          $ipAddress = $request->getRemoteAddress();
          if($text) {
	            if(!Doctrine::getTable('Comment')->doFetchOne(array('id'), 
	            			array('objectType'=>$objectType, 'objectId'=>$objectId, 'text'=>$text, 'name'=>$name, 'ipAddress'=>$ipAddress))) {
	                // save comment
	                $comment = new Comment();
	                $comment->setObjectType($objectType);
	                $comment->setObjectId($objectId);
	                $comment->setIpAddress($ipAddress);
	                $comment->setName($name);
	                $comment->setText($text);
	                $comment->setIsActive(1);
	                $comment->save();
	
	                # update content nb_comment
	                if($content = Doctrine::getTable('Content')->doFetchOne(array('*'), array('nb_comment'), array('id'=>$objectId, 'limit'=>1))) {
	                    $content->setNbComment($content->getNbComment() + 1);  
	                    $content->save();
	                }
	                
	                $rs = Doctrine::getTable('Comment')->doFetchOne(array('*'), array('id'=>$comment->getId()));
	                return $this->renderPartial('comment/box', array('rs'=>$rs));
	            }
	            else $errorString = "Таны сэтгэгдэл амжилттай хадгалагдсан байна.";
          }
          else $errorString = "Та сэтгэгдлээ оруулна уу.";
      }
  
      $str = <<<EOF
               <script type="text/javascript">
                 $('#comment-error').html("{$errorString}");
               </script>
EOF;
      return $this->renderText($str);
  }
  

  public function executeShowAll(sfWebRequest $request)
  {
      $this->objectType = GlobalLib::clearInput($request->getParameter('objectType'));
      $this->objectId = GlobalLib::clearInput($request->getParameter('objectId'));
      $this->setLayout(false);
  }


}	
<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class partialActions extends sfActions
{
  public function preExecute()
  {
  }
  
  public function executeRate(sfWebRequest $request)
  {
  		$objectId = GlobalLib::clearInput($request->getParameter('objectId'));
  		$rate = intval(GlobalLib::clearInput($request->getParameter('rate')));
  		if(!($objectId && $rate)) {
					return $this->renderText("Амжилтгүй боллоо!");
  		}
  		if($this->getUser()->getAttribute('rated'.$objectId)) {
					return $this->renderText("Та өмнө үнэлсэн байна!");
  		}
			// save rating
      $rating = new Rating();
      $rating->setObjectType('item');
      $rating->setObjectId($objectId);
      $rating->setRate($rate);
      $rating->setIpAddress($request->getRemoteAddress());
      $rating->save();
			return $this->renderText("Амжилттай үнэллээ!");
  }

}	
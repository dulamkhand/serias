<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class mainActions extends sfActions
{

    public function preExecute()
    {
    }
  
    public function executeHome(sfWebRequest $request)
    {
        $rss = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), 
              array('limit'=>60));
              
        $arr = array();
        $arr['movie'] = array();
        $arr['series'] = array();
        $arr['tvshow'] = array();
        $arr['mn'] = array();
        $arr['nonfiction'] = array();              
        foreach ($rss as $rs) {
            $arr[$rs['type']][] = $rs;
        }
        $this->arr = $arr;
    }   
    

    public function executeSearch(sfWebRequest $request)
    {
        $this->setLayout(false);
        
        $rss = GlobalTable::doFetchArray('Item', array('type, route, image, title, year'), 
              array('sItem'=>GlobalLib::clearInput($request->getParameter('search'))));
              
        $arr = array();
        $arr['movie'] = array();
        $arr['series'] = array();
        $arr['tvshow'] = array();
        $arr['mn'] = array();
        $arr['nonfiction'] = array();
        foreach ($rss as $rs) {
            $arr[$rs['type']][] = $rs;
        }

        return $this->renderPartial('partial/searchResult', array('arr'=>$arr));
    }
    
    public function execute404(sfWebRequest $request)
    {
        
    }

    public function executeTmp(sfWebRequest $request)
    {
        //echo 
        $rs = new Item();
        $rs->setType();
        $rs->setGenre();
        $rs->setTitle();
        $rs->setYear();
        $rs->setYearEnd();
        $rs->setRoute(GlobalLib::slugify(GlobalLib::mn2en($rs->getTitle().'-'.$rs->getYear())));
        $rs->setImage();
        $rs->setSummary();
        $rs->setBody();
        $rs->setTrailer();
        $rs->setRating();
        $rs->setDuration();
        $rs->setAge();
        $rs->setStudios();
        $rs->setDirector();
        $rs->setWriter();
        $rs->setOfficialLink1();
        $rs->setOfficialLink2();
        $rs->setReleaseDate();
        $rs->setCasts();
        $rs->setBoxoffice();
        $rs->setThisweek();
        $rs->setComingsoon();
        $rs->setSource('imdb.com');
        $rs->setIsActive(1);
        $rs->setCreatedAid(1);
        $rs->save();
        echo 'success'; die();
    }

}

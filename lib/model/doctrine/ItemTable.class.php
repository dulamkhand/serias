<?php

/**
 * ItemTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ItemTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ItemTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Item');
    }
    
    private static function params($q, $params = array())
    {
        $q->from('Item');

        # id
        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
        if(isset($params['idO']) && $params['idO'] != null)
            $q->andWhere('id <> ?', $params['idO']);
        if(isset($params['ids']) && sizeof($params['ids']))
            $q->andWhereIn('id', $params['ids']);
        if(isset($params['idsO']) && sizeof($params['idsO']))
            $q->andWhereNotIn('id', $params['idsO']);
            
        # route
        if(isset($params['route']) && $params['route'] != null)
            $q->andWhere('route= ?', $params['route']);

        # type
        if(isset($params['type']) && $params['type'] != null)
            $q->andWhere('type= ?', $params['type']);
            
        # genres
        if(isset($params['genres']) && $params['genres'] != null && sizeof($params['genres'])) {
            foreach($params['genres'] as $genre) {
                $q->orWhere('genre LIKE ?', '%'.$genre.'%');
            }
        }

        # filters
        if(isset($params['y']) && $params['y'] != null)
            $q->andWhere('year = ? ', $params['y']);
        if(isset($params['g']) && $params['g'] != null)
            $q->andWhere('genre like ? ', '%'.$params['g'].'%');
        if(isset($params['l']) && $params['l'] != null)
            $q->andWhere('title like ?', $params['l'].'%');
            
		    # homepage
        if(isset($params['homepage']))
            $q->andWhere('is_watch_online > 0 OR is_torrent_download > 0 OR is_mongolian_language > 0');

        # rightside
        if(isset($params['rightside']))
            $q->andWhere('boxoffice > 0 OR boxoffice_mn > 0 OR thisweek > 0 OR comingsoon > 0');

				# createdAid
				if(isset($params['createdAid']) && $params['createdAid'] != null)
            $q->andWhere('created_aid = ? ', array($params['createdAid']));
            	
        # keyword
        if(isset($params['s']) && $params['s'] != null)
            $q->andWhere('title LIKE ? ', array('%'.$params['sItem'].'%'));

        # isActive
        if(isset($params['isActive'])) {
            if($params['isActive'] != "all" && in_array($params['isActive'], array('0', '1')))
                $q->andWhere('is_active = ?', $params['isActive']);
        } else {
            $q->andWhere('is_active = ?', 1);
        }
        
        # isFeatured
        if(isset($params['isFeatured']) && in_array($params['isFeatured'], array('0', '1'))) 
            $q->andWhere('is_featured = ?', 1);
        if(isset($params['isTop']) && in_array($params['isTop'], array('0', '1'))) 
            $q->andWhere('is_top = ?', 1);
        if(isset($params['isNew']) && in_array($params['isNew'], array('0', '1'))) 
            $q->andWhere('is_new = ?', 1);

        # group, order, limit
        if(isset($params['groupBy']) && $params['groupBy']) 
            $q->groupBy($params['groupBy']);

        if(isset($params['offset']) && $params['offset'])
            $q->offset($params['offset']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
  
        $order = isset($params['orderBy']) ? $params['orderBy'] : 'created_at DESC';
        $q->orderBy($order);

        return $q;
    }
    

    public static function doExecute($columns = array(), $params = array())
    {
        $q = Doctrine_Query::create()->select(join(',', $columns));
        $q = self::params($q, $params);
        return $q->execute();
    }
    
  
    public static function doFetchArray($columns = array(), $params = array())
    {
        $q = Doctrine_Query::create()->select(join(',', $columns));
        $q = self::params($q, $params);
        return $q->fetchArray();
    }
    
    
    public static function doFetchSelection($fieldName, $columns = array(), $params = array())
    {
        $res = array();
        $rss = self::doFetchArray($columns, $params);
        foreach ($rss as $rs) 
        {
            $res[$rs['id']] = $rs[$fieldName];
        }
        return $res;
    }
  
    public static function doFetchSelectionItem($params = array())
    {
        $res = array();
        $rss = self::doFetchArray(array('id, title, year'), $params);
        foreach ($rss as $rs) {
            $res[$rs['id']] = $rs['title'].' ('.$rs['year'].')';
        }
        return $res;
    }
    
    public static function doFetchOne($columns = array(), $params = array())
    {
        $q = Doctrine_Query::create()->select(join(',', $columns));
        $params['limit'] = 1;
        $q = self::params($q, $params);
        return $q->fetchOne();
    }
    
    
    public static function getPager($columns = array(), $params = array(), $page=1)
    {
        $q = Doctrine_Query::create()->select(join(',', $columns));
        $q = self::params($q, $params);

        $pager = new sfDoctrinePager(sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    public static function doCount($params = array())
    {
        $q = Doctrine_Query::create()->select('count(id)');
        $q = self::params($q, $params);
        return $q->count();
    }
    
}
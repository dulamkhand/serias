<?php

class GlobalLib
{
  
    public static $type   = array('movie'=>'Movie', 'series'=>'Series', 'tvshow'=>'TV show', 'mn'=>'MN films', 'nonfiction'=>'Non fiction');
    public static $typeMN   = array('movie'=>'Кино', 'series'=>'Цуврал', 'tvshow'=>'ТВ Шоу', 'mn'=>'Монгол кино', 'nonfiction'=>'Баримтат кино');
    public static $colors = array('movie'=>'#4D9804', 'series'=>'#067FF9', 'tvshow'=>'#FA3F06', 'mn'=>'#CB1D6B', 'nonfiction'=>'#5F1DCB');

    public static $state  = array('willbegin'=>'willbegin', 'ongoing'=>'ongoing', 'ended'=>'ended');
    public static $banner_position = array(
                        'header'=>'Header 300px65px', 
                        'home-featured'=>'Home featured 450px', 
                        'home-hor'=>'Home horizintal 715px',
                        'home-right'=>'Home right 270px', 
                        'branch1-hor'=>'Branch1 horizintal 800px', 
                        'branch1-left'=>'Branch1 left 450px', 
                        'branch1-pos2'=>'Branch1 pos2 320px', 
                        'branch1-right'=>'Branch1 right 170px', 
                        'branch2-hor'=>'Branch2 horizintal 670px', 
                        'branch2-right'=>'Branch2 right 300px', 
                        'leaf1-left'=>'Leaf1 horizintal 650px',
                        'leaf1-right'=>'Leaf1 right 325px',
                        'footer-up'=>'Footer up 1000px',
                        'sideright'=>'Sideright',
                        'search'=>'Search 1000px');
    public static $alpha_en = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    public static $alpha_mn = array('A','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','Ө','П','Р','С','Т','У','Ү','Х','Ц','Ч','Ш','Щ','Ъ','Ь','Э','Ю','Я','','');
    public static $bad_words = array('shit','crap','damn','bugger','jerk','asshole','bastard','douche','slut','fucking','fuck','bitch','cock','dick','darn','fag','piss','penis','pussy');
    public static $reserved_words = array('whats the reserved words');
    public static $mod_permissions = array('news'=>'news', 
              'comment'=>'comment', 'discuss'=>'discuss', 'banner'=>'banner', 'coupon'=>'coupon', 'quote'=>'quote', 
              'quiz'=>'quiz', 'poll'=>'poll', 'subscriber'=>'subscriber', 'admin'=>'admin', 'user'=>'user');
    public static $days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,
            17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31);

    public static function getArray($type)
    {
        switch ($type) {
          	case 'type'  : return self::$type;
          	case 'typeMN'  : return self::$typeMN;
          	case 'colors': return self::$colors;
        }
        return array();
    }
    
    public static function getValues($type)
    {
        return array_values(self::getArray($type));
    }    
    
    public static function getKeys($type)
    {
        return array_keys(self::getArray($type));
    }
    
    public static function getValue($type, $key)
    {
        $array = self::getArray($type);
        return $array[$key];
    }
    
    
    ################################################################################################################################################################
    
    public static function getNumbers($min=1, $max=1000)
    {
        $a = array();
        for($i=$min; $i <= $max; $i++) {
            $a[$i] = $i;
        }
        return $a;
    }
    
    
    
    
    static public function slugify($text)
    {
        // replace all non letters or digits by -
        $text = preg_replace('/\W+/', '-', $text);
     
        // trim and lowercase
        $text = strtolower(trim($text, '-'));
     
        return $text;
    }
    

    public static function utf8_substr($str,$from,$len) {
        # utf8 substr
        $str = preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                '$1',$str);
        return GlobalLib::clearOutput($str);
    }
    
    
    public static function mn2en($st) {
        $replacement = array(
                "й"=>"i","ц"=>"ts","у"=>"u","к"=>"k","е"=>"ye","н"=>"n",'ү'=>'u',
                "г"=>"g","ш"=>"sh","щ"=>"sh","з"=>"z","х"=>"h","ъ"=>"-",'ө'=>'u',
                "ф"=>"f","ы"=>"ii","в"=>"v","а"=>"a","п"=>"p","р"=>"r",
                "о"=>"o","л"=>"l","д"=>"d","ж"=>"j","э"=>"e","ё"=>"yo",
                "я"=>"ya","ч"=>"ch","с"=>"s","м"=>"m","и"=>"i","т"=>"t",
                "ь"=>"-","б"=>"b","ю"=>"yu","\""=>"-","'"=>"-",
                "Й"=>"I","Ц"=>"TS","У"=>"U","К"=>"K","Е"=>"YE","Н"=>"N",'Ү'=>'U',
                "Г"=>"G","Ш"=>"SH","Щ"=>"SH","З"=>"Z","Х"=>"H","Ъ"=>"-",'Ө'=>'U',
                "Ф"=>"F","Ы"=>"II","В"=>"V","А"=>"A","П"=>"P","Р"=>"R",
                "О"=>"O","Л"=>"L","Д"=>"D","Ж"=>"J","Э"=>"E","Ё"=>"YO",
                "Я"=>"YA","Ч"=>"CH","С"=>"S","М"=>"M","И"=>"I","Т"=>"T",
                "Ь"=>"-'","Б"=>"B","Ю"=>"YU",
        );
    
        foreach($replacement as $i=>$u) {
            $st = mb_eregi_replace($i,$u,$st);
        }
        return $st;
    }
    
    public static function createThumbs($filename, $folder, $thumbs=array(), $removeOrg=false) 
    {
        try {
            $ext = myTools::getFileExtension($filename);
            if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
            {
                $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
                if (sizeof($thumbs) && $filename && file_exists($uploadDir.$filename)) {
                    // create thumbs
                    foreach ($thumbs as $thumb) {
                        $thumbnail = new sfThumbnail($thumb, null, true, false, 100);
                        $thumbnail->loadFile($uploadDir.$filename);
                        $thumbnail->save($uploadDir."t".$thumb."-".$filename);
                    }
                    // remove orig image
                    if($removeOrg) unlink($uploadDir.$filename);
                    return true;
                }
            } // not an image file
        }catch (Exception $e) {
    
        }
        return false;
    }  
    
    public static function createQualities($filename, $folder, $qualities=array(), $removeOrg=false) 
    {
        try {
            $ext = myTools::getFileExtension($filename);
            if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
            {
                $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
                if (sizeof($qualities) && $filename && file_exists($uploadDir.$filename)) {
                    // create quilities
                    foreach ($qualities as $quality) {
                        $thumbnail = new sfThumbnail(null, null, true, false, $quality);
                        $thumbnail->loadFile($uploadDir.$filename);
                        $thumbnail->save($uploadDir."q".$quality."-".$filename);
                    }
                    // remove orig image
                    if($removeOrg) unlink($uploadDir.$filename);
                    return true;
                }
            } // not an image file
        }catch (Exception $e) {
    
        }
        return false;
    }
    
    
    
    public static function clearOutput($text)
    {
        return nl2br(htmlspecialchars_decode(strip_tags($text, '<strong><b><i><em><u><sup><sub><ol><ul><li><a><img><embed><object>')));
    }
    
    public static function clearInput($text)
    {
        // xss, html tags are escaped here?
        $text = preg_replace('/\?/', ' ', $text);
        $text = preg_replace('/\"/', ' ', $text);
        $text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/</', ' ', $text);
        $text = preg_replace('/>/', ' ', $text);
        
        // strip tags
        $text = strip_tags($text);
        return $text;
    }

}

?>
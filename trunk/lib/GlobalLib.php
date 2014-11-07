<?php

class GlobalLib
{
  
    public static $type   = array('movie'=>'Movie', 'series'=>'Series', 'tvshow'=>'TV show', 'mn'=>'MN films', 'nonfiction'=>'Non fiction');
    public static $type_mn = array('movie'=>'Кино', 'series'=>'Цуврал', 'tvshow'=>'ТВ Шоу', 'mn'=>'Монгол кино', 'nonfiction'=>'Баримтат кино');
    public static $colors = array('movie'=>'#4D9804', 'series'=>'#067FF9', 'tvshow'=>'#FA3F06', 'mn'=>'#CB1D6B', 'nonfiction'=>'#5F1DCB');
    public static $genre  = array(
                  'action'=>'Action', 
                  'adventure'=>'Adventure', 
                  'animation'=>'Animation', 
                  'biography'=>'Biography', 
                  'comedy'=>'Comedy', 
                  'crime'=>'Crime', 
                  'children'=>'Children', 
                  'drama'=>'Drama', 
                  'fantasy'=>'Fantasy', 
                  'horror'=>'Horror',
                  'romance'=>'Romance', 
                  'scifi'=>'SciFi', 
                  'thriller'=>'Thriller', 
                  'western'=>'Western', 
    );
    public static $genre_mn  = array(
                  'thriller'=>'Адал явдалт/Аймшгийн', 
                  'adventure'=>'Адал явдалт', 
                  'horror'=>'Аймшгийн',
                  'action'=>'Акшн', 
                  'animation'=>'Анимэшн', 
                  'western'=>'Барууны', 
                  'crime'=>'Гэмт хэргийн', 
                  'fantasy'=>'Зөгнөлт', 
                  'comedy'=>'Инээдмийн', 
                  'biography'=>'Намтарчилсан', 
                  'children'=>'Хүүхдийн', 
                  'romance'=>'Хайр дурлалын', 
                  'drama'=>'Уянгын', 
                  'scifi'=>'Шинжлэх ухааны уран зөгнөлт', 
    );

    
    public static $alpha_en = array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I',
                  'J'=>'J','K'=>'K','L'=>'L','M'=>'M','N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T',
                  'U'=>'U','V'=>'V','W'=>'W','X'=>'X','Y'=>'Y','Z'=>'Z');
    public static $alpha_mn = array('A'=>'A','Б'=>'Б','В'=>'В','Г'=>'Г','Д'=>'Д','Е'=>'Е','Ё'=>'Ё','Ж'=>'Ж','З'=>'З','И'=>'И',
                  'Й'=>'Й','К'=>'К','Л'=>'Л','М'=>'М','Н'=>'Н','О'=>'О','Ө'=>'Ө','П'=>'П','Р'=>'Р','С'=>'С','Т'=>'Т','У'=>'У',
                  'Ү'=>'Ү','Х'=>'Х','Ц'=>'Ц','Ч'=>'Ч','Ш'=>'Ш','Щ'=>'Щ','Ъ'=>'Ъ','Ь'=>'Ь','Э'=>'Э','Ю'=>'Ю','Я'=>'Я');
    public static $years = array(2014=>2014,2013=>2013,2011=>2011,2010=>2010,
                  2009=>2009,2008=>2008,2007=>2007,2006=>2006,2005=>2005,
                  2004=>2004,2003=>2003,2002=>2002,2001=>2001,2000=>2000,
                  1990=>1990,1980=>1980,1970=>1970,1960=>'1960-с өмнө');
    public static $days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,
            17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31);

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

    public static $mod_permissions = array('item'=>'Item', 'link'=>'Link', 'admin'=>'admin');   

    public static function getArray($type)
    {
        switch ($type) {
            case 'colors': return self::$colors;
          	case 'type'  : return self::$type;
          	case 'type_mn'  : return self::$type_mn;
          	case 'genre': return self::$genre;
          	case 'genre_mn': return self::$genre_mn;
          	case 'alpha_en': return self::$alpha_en;
          	case 'alpha_mn': return self::$alpha_mn;
          	case 'years': return self::$years;
          	case 'days': return self::$days;
          	case 'mod_permissions': return self::$mod_permissions;
          	case 'banner_position': return self::$banner_position;
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
    
    
  
    public static function getFileName($fileName) {
        try {
          return substr($fileName, strrpos($fileName,'/')+1,strlen($fileName)-strrpos($fileName,'/'));
        }catch (Exception $e) {
    
        }
        return ;
    }
  
    public static function getFileExtension($fileName) {
        return strtolower(substr(strrchr($fileName, '.'), 1));
    }
  
    public static function get3FileExtension($fileName) {
        $ext = strtolower(substr(strrchr($fileName, '.'), 1));
        if(in_array($ext, array('doc','docx','xls','xlsx','pdf','pdfx'))) {
          return $ext;
        }
        return 'pdf';
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
            $ext = GlobalLib::getFileExtension($filename);
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
            $ext = GlobalLib::getFileExtension($filename);
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
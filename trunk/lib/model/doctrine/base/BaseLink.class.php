<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Link', 'doctrine');

/**
 * BaseLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $item_id
 * @property string $title
 * @property string $link
 * @property integer $season
 * @property integer $episode
 * @property integer $sort
 * @property integer $nb_views
 * @property boolean $is_active
 * @property boolean $is_featured
 * @property integer $created_aid
 * @property integer $updated_aid
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method integer   getItemId()      Returns the current record's "item_id" value
 * @method string    getTitle()       Returns the current record's "title" value
 * @method string    getLink()        Returns the current record's "link" value
 * @method integer   getSeason()      Returns the current record's "season" value
 * @method integer   getEpisode()     Returns the current record's "episode" value
 * @method integer   getSort()        Returns the current record's "sort" value
 * @method integer   getNbViews()     Returns the current record's "nb_views" value
 * @method boolean   getIsActive()    Returns the current record's "is_active" value
 * @method boolean   getIsFeatured()  Returns the current record's "is_featured" value
 * @method integer   getCreatedAid()  Returns the current record's "created_aid" value
 * @method integer   getUpdatedAid()  Returns the current record's "updated_aid" value
 * @method timestamp getCreatedAt()   Returns the current record's "created_at" value
 * @method timestamp getUpdatedAt()   Returns the current record's "updated_at" value
 * @method Link      setId()          Sets the current record's "id" value
 * @method Link      setItemId()      Sets the current record's "item_id" value
 * @method Link      setTitle()       Sets the current record's "title" value
 * @method Link      setLink()        Sets the current record's "link" value
 * @method Link      setSeason()      Sets the current record's "season" value
 * @method Link      setEpisode()     Sets the current record's "episode" value
 * @method Link      setSort()        Sets the current record's "sort" value
 * @method Link      setNbViews()     Sets the current record's "nb_views" value
 * @method Link      setIsActive()    Sets the current record's "is_active" value
 * @method Link      setIsFeatured()  Sets the current record's "is_featured" value
 * @method Link      setCreatedAid()  Sets the current record's "created_aid" value
 * @method Link      setUpdatedAid()  Sets the current record's "updated_aid" value
 * @method Link      setCreatedAt()   Sets the current record's "created_at" value
 * @method Link      setUpdatedAt()   Sets the current record's "updated_at" value
 * 
 * @package    imdb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('link');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('item_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('link', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
        $this->hasColumn('season', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('episode', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('sort', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nb_views', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('is_featured', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('created_aid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('updated_aid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
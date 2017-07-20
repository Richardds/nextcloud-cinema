<?php

namespace OCA\Cinema\Db;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class MovieMapper extends Mapper
{
    /**
     * MovieMapper constructor.
     * @param IDBConnection $db
     */
    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, '*dbprefix*cinema_movies', '\OCA\Cinema\Db\Movie');
    }

    /**
     * @param $id
     * @return \OCP\AppFramework\Db\Entity
     */
    public function find(int $id)
    {
        $sql = 'SELECT * FROM `*PREFIX*cinema_movies` WHERE id = ?';
        return $this->findEntity($sql, [$id]);
    }

    /**
     * @return \OCP\AppFramework\Db\Entity
     */
    public function findAll() {
        $sql = 'SELECT * FROM `*PREFIX*cinema_movies`';
        return $this->findEntities($sql);
    }
}
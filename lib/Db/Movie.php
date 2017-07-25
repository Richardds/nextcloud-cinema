<?php

namespace OCA\Cinema\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Movie extends Entity implements JsonSerializable
{
    /**
     * @var string
     */
    protected $accessId;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $titleAlt;

    /**
     * @var int
     */
    protected $releaseYear;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var integer
     */
    protected $filesize;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'access_id' => $this->accessId,
            'title' => $this->title,
            'title_alt' => $this->titleAlt,
            'release_year' => $this->releaseYear,
            'duration' => $this->duration,
            'width' => $this->width,
            'height' => $this->height,
            'filesize' => $this->filesize,
            'filename' => $this->filename
        ];
    }
}

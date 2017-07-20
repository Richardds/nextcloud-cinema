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
     * @var string
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
     * @var int
     */
    protected $size;

    /**
     * @var bool
     */
    protected $playable;

    /**
     * @return string
     */
    public function getAccessId(): string
    {
        return $this->accessId;
    }

    /**
     * @param string $accessId
     */
    public function setAccessId(string $accessId)
    {
        $this->accessId = $accessId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitleAlt(): string
    {
        return $this->titleAlt;
    }

    /**
     * @param string $titleAlt
     */
    public function setTitleAlt(string $titleAlt)
    {
        $this->titleAlt = $titleAlt;
    }

    /**
     * @return int
     */
    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    /**
     * @param int $releaseYear
     */
    public function setReleaseYear(int $releaseYear)
    {
        $this->releaseYear = $releaseYear;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

    /**
     * @return bool
     */
    public function isPlayable(): bool
    {
        return $this->playable;
    }

    /**
     * @param bool $playable
     */
    public function setPlayable(bool $playable)
    {
        $this->playable = $playable;
    }

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
            'size' => $this->size,
            'playable' => $this->playable
        ];
    }
}

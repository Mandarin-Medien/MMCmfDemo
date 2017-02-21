<?php
/**
 * Created by PhpStorm.
 * User: tonigurski
 * Date: 03.02.16
 * Time: 16:56
 */

namespace AppBundle\Entity;

use MandarinMedien\MMCmfContentBundle\Entity\ParagraphContentNode;
use MandarinMedien\MMMediaBundle\Entity\MediaSortable;

class TileContentNode extends ParagraphContentNode
{
    protected $link;

    /**
     * @var MediaSortable
     */
    protected $media;

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return TileContentNode
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return MediaSortable
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param MediaSortable $media
     * @return TileContentNode
     */
    public function setMedia($media)
    {
        $this->media = $media;
        return $this;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: tonigurski
 * Date: 03.02.16
 * Time: 16:56
 */

namespace AppBundle\Entity;

use MandarinMedien\MMCmfContentBundle\Entity\ParagraphContentNode;

class TileContentNode extends ParagraphContentNode
{
    protected $link;

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




}
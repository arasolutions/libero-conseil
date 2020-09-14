<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

class Activity
{
    /**
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @JMS\Type("string")
     */
    private $titre;

    /**
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @JMS\Type("integer")
     */
    private $image;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("imagedescription")
     */
    private $imageDescription;

    /**
     * @JMS\Type("integer")
     */
    private $ordre;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getImageDescription()
    {
        return $this->imageDescription;
    }

    /**
     * @return mixed
     */
    public function getOrdre()
    {
        return $this->ordre;
    }


}

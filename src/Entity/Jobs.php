<?php

namespace App\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Jobs
 * @package App\Entity
 */
class Jobs
{


    /** @JMS\Exclude */
    private $id;

    /**
     * @JMS\Type("int")
     */
    private $total;

    /**
     * @JMS\Type("ArrayCollection<App\Entity\Job>")
     */
    private $data;

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
    public function getTotal()
    {
        return $this->total;
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}

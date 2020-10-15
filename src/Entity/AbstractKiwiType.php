<?php


namespace App\Entity;

use JMS\Serializer\Annotation as JMS;


abstract class  AbstractKiwiType
{
    /** @JMS\Exclude */
    private $id;

    /**
     * @JMS\Type("int")
     */
    private $total;


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

}
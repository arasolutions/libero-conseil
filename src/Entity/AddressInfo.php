<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

class AddressInfo
{
    /**
     * @JMS\SerializedName("street_number")
     * @JMS\Type("string")
     */
    private $streetNumber;

    /**
     * @JMS\Type("string")
     */
    private $route;

    /**
     * @JMS\Type("string")
     */
    private $locality ;

    /**
     * @JMS\SerializedName("postal_code")
     * @JMS\Type("string")
     */
    private $postalCode ;

    /**
     * @return mixed
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param mixed $streetNumber
     */
    public function setStreetNumber($streetNumber): void
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route): void
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param mixed $locality
     */
    public function setLocality($locality): void
    {
        $this->locality = $locality;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode): void
    {
        $this->postalCode = $postalCode;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

class Job
{
    /**
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @JMS\Type("string")
     */
    private $uid;

    /**
     * @JMS\Type("string")
     */
    private $label;

    /**
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @JMS\SerializedName("published_on")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $publishAt;

    /**
     * @JMS\SerializedName("contract_type")
     * @JMS\Type("string")
     */
    private $typeContrat;

    /**
     * @JMS\SerializedName("employment_type")
     * @JMS\Type("string")
     */
    private $duree;

    /**
     * @JMS\Type("string")
     */
    private $requirements;

    /**
     * @JMS\SerializedName("zipcode")
     * @JMS\Type("string")
     */
    private $zipCode;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("cus_fld_2")
     */
    private $street;

    /**
     * @JMS\SerializedName("industryLabel")
     * @JMS\Type("string")
     */
    private $domain;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }



    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPublishAt()
    {
        return $this->publishAt;
    }

    /**
     * @param mixed $publishAt
     */
    public function setPublishAt($publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * @param mixed $typeContrat
     */
    public function setTypeContrat($typeContrat): void
    {
        $this->typeContrat = $typeContrat;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param mixed $requirements
     */
    public function setRequirements($requirements): void
    {
        $this->requirements = $requirements;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

}

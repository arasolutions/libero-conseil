<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

class Member
{
    /**
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @JMS\Type("string")
     */
    private $prenom;

    /**
     * @JMS\Type("string")
     */
    private $nom;

    /**
     * @JMS\Type("integer")
     */
    private $photo;

    /**
     * @JMS\Type("string")
     */
    private $poste;

    /**
     * @JMS\Type("string")
     */
    private $telephone;

    /**
     * @JMS\SerializedName("mail")
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @JMS\Type("string")
     */
    private $linkedin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function getPhoto(): ?int
    {
        return $this->photo;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
    public function getLinkedin()
    {
        return $this->linkedin;
    }


}

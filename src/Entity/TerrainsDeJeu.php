<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

class TerrainsDeJeu extends AbstractKiwiType
{

    /**
     * @JMS\Type("ArrayCollection<App\Entity\TerrainDeJeu>")
     */
    private $items;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items): void
    {
        $this->items = $items;
    }
}

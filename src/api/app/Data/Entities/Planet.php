<?php

namespace src\Data\Entities;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use phpDocumentor\Reflection\Types\String_;
use Ramsey\Uuid\Uuid;
use src\Data\Entities\Starship;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity
 * @ORM\Table(name="planet")
 */
class Planet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="uuid", unique=true)
     */
    private string $uuid;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $gravity;

    /**
     * @ORM\Column(type="integer")
     */
    private int $population;

    /**
    * @ORM\OneToMany(targetEntity="Starship", mappedBy="planet", cascade={"persist"})
    */
    private $starships;

    public function __construct(
    ) {
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setGravity(string $gravity): void
    {
        $this->gravity = $gravity;
    }

    public function setPopulation(int $population): void
    {
        $this->population = $population;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGravity(): string
    {
        return $this->gravity;
    }

    public function setStarships(array $starships): void
    {
        $this->starships = new ArrayCollection;

        foreach ($starships as $starship) {
            if(! $this->starships->contains($starship)) {
                $starship->setPlanet($this);
                $this->starships->add($starship);
            }
        }
    }

    public function getStarships()
    {
        return $this->starships;
    }
}
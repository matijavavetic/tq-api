<?php

namespace src\Data\Entities;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\String_;
use src\Data\Entities\Starship;

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
    * @var ArrayCollection|Starship[]
    */
    private $starships;

    public function __construct(
        string $name, 
        string $gravity, 
        int $population
    ) {
        $this->name = $name;
        $this->gravity = $gravity;
        $this->population = $population;
        $this->starships = new ArrayCollection;
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

    public function getStarships(): ?ArrayCollection
    {
        return $this->starships;
    }
}
<?php

namespace src\Data\Entities;

use Doctrine\ORM\Mapping AS ORM;
use src\Data\Entities\Planet;

/**
 * @ORM\Entity
 * @ORM\Table(name="starship")
 */
class Starship
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
    private string $model;

    /**
     * @ORM\Column(type="integer")
     */
    private int $passengers;

    /**
    * @ORM\ManyToOne(targetEntity="Planet", inversedBy="starships")
    * @var Planet
    */
    private Planet $planet;

    public function __construct(
        string $name, 
        string $model, 
        int $passengers
    ) {
        $this->name = $name;
        $this->model = $model;
        $this->passengers = $passengers;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setPassengers(int $passengers): void
    {
        $this->passengers = $passengers;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPassengers(): int
    {
        return $this->passengers;
    }

    public function setPlanet(Planet $planet): void
    {
        $this->planet = $planet;
    }

    public function getPlanet(): ?Planet
    {
        return $this->planet;
    }
}
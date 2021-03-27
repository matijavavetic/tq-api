<?

namespace src\Data\Entities;

use src\Data\Entities\Contracts\PlanetEntityInterface;
use DateTime;

class Planet implements PlanetEntityInterface
{
    private string $name;
    private string $diameter;
    private string $rotationPeriod;
    private string $orbitalPeriod;
    private string $gravity;
    private string $population;
    private string $climate;
    private string $terrain;
    private string $surfaceWater;
    private array $films;
    private array $residents;
    private string $url;
    private DateTime $created;
    private DateTime $edited;

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of diameter
     *
     * @return  string
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * Set the value of diameter
     *
     * @param  string  $diameter
     *
     * @return  self
     */
    public function setDiameter(string $diameter)
    {
        $this->diameter = $diameter;

        return $this;
    }

    /**
     * Get the value of rotationPeriod
     *
     * @return  string
     */
    public function getRotationPeriod()
    {
        return $this->rotationPeriod;
    }

    /**
     * Set the value of rotationPeriod
     *
     * @param  string  $rotationPeriod
     *
     * @return  self
     */
    public function setRotationPeriod(string $rotationPeriod)
    {
        $this->rotationPeriod = $rotationPeriod;

        return $this;
    }

    /**
     * Get the value of orbitalPeriod
     *
     * @return  string
     */
    public function getOrbitalPeriod()
    {
        return $this->orbitalPeriod;
    }

    /**
     * Set the value of orbitalPeriod
     *
     * @param  string  $orbitalPeriod
     *
     * @return  self
     */
    public function setOrbitalPeriod(string $orbitalPeriod)
    {
        $this->orbitalPeriod = $orbitalPeriod;

        return $this;
    }

    /**
     * Get the value of gravity
     *
     * @return  string
     */
    public function getGravity()
    {
        return $this->gravity;
    }

    /**
     * Set the value of gravity
     *
     * @param  string  $gravity
     *
     * @return  self
     */
    public function setGravity(string $gravity)
    {
        $this->gravity = $gravity;

        return $this;
    }

    /**
     * Get the value of population
     *
     * @return  string
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set the value of population
     *
     * @param  string  $population
     *
     * @return  self
     */
    public function setPopulation(string $population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get the value of climate
     *
     * @return  string
     */
    public function getClimate()
    {
        return $this->climate;
    }

    /**
     * Set the value of climate
     *
     * @param  string  $climate
     *
     * @return  self
     */
    public function setClimate(string $climate)
    {
        $this->climate = $climate;

        return $this;
    }

    /**
     * Get the value of terrain
     *
     * @return  string
     */
    public function getTerrain()
    {
        return $this->terrain;
    }

    /**
     * Set the value of terrain
     *
     * @param  string  $terrain
     *
     * @return  self
     */
    public function setTerrain(string $terrain)
    {
        $this->terrain = $terrain;

        return $this;
    }

    /**
     * Get the value of surfaceWater
     *
     * @return  string
     */
    public function getSurfaceWater()
    {
        return $this->surfaceWater;
    }

    /**
     * Set the value of surfaceWater
     *
     * @param  string  $surfaceWater
     *
     * @return  self
     */
    public function setSurfaceWater(string $surfaceWater)
    {
        $this->surfaceWater = $surfaceWater;

        return $this;
    }

    /**
     * Get the value of films
     *
     * @return  array
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * Set the value of films
     *
     * @param  array  $films
     *
     * @return  self
     */
    public function setFilms(array $films)
    {
        $this->films = $films;

        return $this;
    }

    /**
     * Get the value of residents
     *
     * @return  array
     */
    public function getResidents()
    {
        return $this->residents;
    }

    /**
     * Set the value of residents
     *
     * @param  array  $residents
     *
     * @return  self
     */
    public function setResidents(array $residents)
    {
        $this->residents = $residents;

        return $this;
    }

    /**
     * Get the value of url
     *
     * @return  string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @param  string  $url
     *
     * @return  self
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return  string
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param  string  $created
     *
     * @return  self
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of edited
     *
     * @return  string
     */
    public function getEdited(): DateTime
    {
        return $this->edited;
    }

    /**
     * Set the value of edited
     *
     * @param  string  $edited
     *
     * @return  self
     */
    public function setEdited(DateTime $edited)
    {
        $this->edited = $edited;

        return $this;
    }
}
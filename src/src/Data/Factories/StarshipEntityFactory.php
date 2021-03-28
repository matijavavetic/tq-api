<?

namespace src\Data\Factories;

use src\Data\Mappers\PlanetEntityCollection;
use src\Data\Entities\Starship;

class StarshipEntityFactory
{
    public static function make(array $data): Starship
    {
        $starship = new Starship();

        $starship
            ->setName($data['name'])
            ->setModel($data['model'])
            ->setStarshipClass($data['starship_class'])
            ->setManufacturer($data['manufacturer'])
            ->setCostInCredits($data['cost_in_credits'])
            ->setLength($data['length'])
            ->setCrew($data['crew'])
            ->setPassengers((int) $data['passengers'])
            ->setMaxAtmospheringSpeed($data['max_atmosphering_speed'])
            ->setHyperdriveRating($data['hyperdrive_rating'])
            ->setMGLT($data['MGLT'])
            ->setCargoCapacity($data['cargo_capacity'])
            ->setConsumables($data['consumables'])
            ->setFilms($data['films'])
            ->setPilots($data['pilots'])
            ->setUrl($data['url'])
            ->setCreated($data['created'])
            ->setEdited($data['edited']);
            
        return $starship;
    }
}
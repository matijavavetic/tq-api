<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\StarshipRepositoryInterface;
use src\Data\Entities\Starship;
use src\Data\Mappers\StarshipEntityCollection;
use src\Applications\Enums\SWApiEndpoint;

class StarshipRepository extends AbstractRepository implements StarshipRepositoryInterface
{
    public function list(int $passengers): StarshipEntityCollection
    {
        $response = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::STARSHIPS));

        $results = $response['results'];

        $starshipCollection = new StarshipEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $starship = $this->create($result);

                $starshipCollection->tack($starship);
            }
        }

        $filteredCollection = $starshipCollection->filter(function ($starship) use ($passengers) {
            return $starship->getPassengers() > $passengers;
        });

        return $filteredCollection;
    }

    public function create(array $data): Starship
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
            ->setPassengers($data['passengers'])
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
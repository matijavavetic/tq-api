<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\StarshipRepositoryInterface;
use src\Data\Factories\StarshipEntityFactory;
use src\Data\Mappers\StarshipEntityCollection;
use src\Data\Enums\SWApiEndpoint;

class StarshipRepository extends AbstractRepository implements StarshipRepositoryInterface
{
    public function list(?int $passengers = 84000): StarshipEntityCollection
    {
        $results = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::STARSHIPS));

        $starshipCollection = new StarshipEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $starship = StarshipEntityFactory::make($result);

                $starshipCollection->tack($starship);
            }
        }

        $filteredCollection = $starshipCollection->filter(function ($starship) use ($passengers) {
            return $starship->getPassengers() > $passengers;
        });

        return $filteredCollection;
    }
}
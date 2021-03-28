<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\PlanetRepositoryInterface;
use src\Data\Factories\PlanetEntityFactory;
use src\Data\Mappers\PlanetEntityCollection;
use src\Data\Enums\SWApiEndpoint;

class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{
    public function list(string $createdAfter): PlanetEntityCollection
    {
        $results = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PLANETS));

        $planetCollection = new PlanetEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $planet = PlanetEntityFactory::make($result);

                $planetCollection->tack($planet);
            }
        }

        $filteredCollection = $planetCollection->filter(function ($planet) use ($createdAfter) {
            return $planet->getCreated() > $createdAfter;
        });

        return $filteredCollection;
    }
}
<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\PlanetRepositoryInterface;
use src\Data\Entities\Planet;
use src\Data\Mappers\PlanetEntityCollection;
use Carbon\Carbon;

class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{
    public function list(string $createdAfter): PlanetEntityCollection
    {
        $response = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PLANETS));

        $results = $response['results'];

        $planetCollection = new PlanetEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $planet = $this->create($result);

                $planetCollection->tack($planet);
            }
        }

        $filteredCollection = $planetCollection->filter(function ($planet) use ($createdAfter) {
            return $planet->getCreated() > $createdAfter;
        });

        return $filteredCollection;
    }

    public function create(array $data): Planet
    {
        $planet = new Planet();

        $planet
            ->setName($data['name'])
            ->setDiameter($data['diameter'])
            ->setRotationPeriod($data['rotation_period'])
            ->setOrbitalPeriod($data['orbital_period'])
            ->setGravity($data['gravity'])
            ->setPopulation($data['population'])
            ->setClimate($data['climate'])
            ->setTerrain($data['terrain'])
            ->setSurfaceWater($data['surface_water'])
            ->setResidents($data['residents'])
            ->setFilms($data['films'])
            ->setUrl($data['url'])
            ->setCreated(Carbon::parse($data['created']))
            ->setEdited(Carbon::parse($data['edited']));
            
        return $planet;
    }
}
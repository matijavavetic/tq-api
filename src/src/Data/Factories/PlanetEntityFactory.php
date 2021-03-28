<?

namespace src\Data\Factories;

use src\Data\Entities\Planet;
use Carbon\Carbon;

class PlanetEntityFactory
{
    public static function make(array $data): Planet
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
<?

namespace src\Business\Factories\Planet;

use src\Data\Mappers\PlanetEntityCollection;
use src\Business\Mappers\Planet\Response\PlanetListResponseMapper;
use src\Business\Mappers\Planet\PlanetMapper;
use src\Data\Mappers\PlanetMapperCollection;

class PlanetListResponseMapperFactory
{
    public static function make(PlanetEntityCollection $planetCollection): PlanetListResponseMapper
    {
        $planetMapperCollection = new PlanetMapperCollection();

        foreach ($planetCollection as $planet) {
            $planetMapper = new PlanetMapper(
                $planet->getName(),
                $planet->getDiameter(),
                $planet->getRotationPeriod(),
                $planet->getOrbitalPeriod(),
                $planet->getGravity(),
                $planet->getPopulation(),
                $planet->getClimate(),
                $planet->getTerrain(),
                $planet->getSurfaceWater(),
                $planet->getResidents(),
                $planet->getFilms(),
                $planet->getUrl(),
                $planet->getCreated(),
                $planet->getEdited()
            );

            $planetMapperCollection->tack($planetMapper);
        }

        $responseMapper = new PlanetListResponseMapper();
        $responseMapper->setPlanetMappers($planetMapperCollection);

        return $responseMapper;
    }
}
<?

namespace src\Business\Factories\Starship;

use src\Data\Mappers\StarshipEntityCollection;
use src\Business\Mappers\Starship\Response\StarshipListResponseMapper;
use src\Business\Mappers\Starship\StarshipMapper;
use src\Data\Mappers\StarshipMapperCollection;

class StarshipListResponseMapperFactory
{
    public static function make(StarshipEntityCollection $starshipCollection): StarshipListResponseMapper
    {
        $starshipMapperCollection = new StarshipMapperCollection();

        foreach ($starshipCollection as $starship) {
            $starshipMapper = new StarshipMapper(
                $starship->getName(),
                $starship->getModel(),
                $starship->getStarshipClass(),
                $starship->getManufacturer(),
                $starship->getCostInCredits(),
                $starship->getLength(),
                $starship->getCrew(),
                $starship->getPassengers(),
                $starship->getMaxAtmospheringSpeed(),
                $starship->getHyperdriveRating(),
                $starship->getMGLT(),
                $starship->getCargoCapacity(),
                $starship->getConsumables(),
                $starship->getFilms(),
                $starship->getPilots(),
                $starship->getUrl(),
                $starship->getCreated(),
                $starship->getEdited()
            );

            $starshipMapperCollection->tack($starshipMapper);
        }

        $responseMapper = new StarshipListResponseMapper();
        $responseMapper->setStarshipMappers($starshipMapperCollection);

        return $responseMapper;
    }
}
<?

namespace src\Data\Repositories;

use src\Data\Factories\FilmEntityFactory;
use src\Data\Enums\SWApiEndpoint;
use src\Data\Mappers\FilmEntityCollection;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;

class FilmRepository extends AbstractRepository implements FilmRepositoryInterface
{
    public function findAllByCharacterUrl(string $characterUrl): FilmEntityCollection
    {
        $results = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::FILMS));

        $filmCollection = new FilmEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $film = FilmEntityFactory::make($result);

                $filmCollection->tack($film);
            }
        }

        $filteredCollection = $filmCollection->filter(function ($film) use ($characterUrl) {
            return in_array($characterUrl, $film->getCharacters());
        });

        return $filteredCollection;
    }
}
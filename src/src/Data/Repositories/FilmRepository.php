<?

namespace src\Data\Repositories;

use src\Data\Entities\Film;
use src\Applications\Enums\SWApiEndpoint;
use src\Data\Mappers\FilmEntityCollection;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;

class FilmRepository extends AbstractRepository implements FilmRepositoryInterface
{
    public function findAllByCharacterUrl(string $characterUrl): FilmEntityCollection
    {
        $response = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::FILMS));

        $results = $response['results'];

        $filmCollection = new FilmEntityCollection();

        if (! empty($results)) {
            foreach ($results as $result) {
                $film = $this->create($result);

                $filmCollection->tack($film);
            }
        }

        $filteredCollection = $filmCollection->filter(function ($film) use ($characterUrl) {
            return in_array($characterUrl, $film->getCharacters());
        });

        return $filteredCollection;
    }

    public function create(array $filmData): Film
    {
        $film = new Film();

        $film
            ->setTitle($filmData['title'])
            ->setEpisodeId($filmData['episode_id'])
            ->setOpeningCrawl($filmData['opening_crawl'])
            ->setDirector($filmData['director'])
            ->setProducer($filmData['producer'])
            ->setReleaseDate($filmData['release_date'])
            ->setSpecies($filmData['species'])
            ->setVehicles($filmData['vehicles'])
            ->setStarships($filmData['starships'])
            ->setCharacters($filmData['characters'])
            ->setPlanets($filmData['planets'])
            ->setUrl($filmData['url'])
            ->setCreated($filmData['created'])
            ->setEdited($filmData['edited']);
            
        return $film;
    }
}
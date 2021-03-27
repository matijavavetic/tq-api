<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Mappers\FilmEntityCollection;
use src\Data\Entities\Film;

class FilmRepository extends AbstractRepository implements FilmRepositoryInterface
{
    public function findAllByCharacterUrl(string $characterUrl): FilmEntityCollection
    {
        $response = $this->apiClient->fetchFilms();

        $films = $response['results'];

        $filmCollection = new FilmEntityCollection();

        if (! empty($films)) {
            foreach ($films as $key => $value) {
                if (! in_array($characterUrl, $films[$key]['characters'])) {
                    unset($films[$key]);
                    continue;
                }

                $film = $this->create($films[$key]);

                $filmCollection->tack($film);
            }
        }

        return $filmCollection;
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
<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Mappers\FilmEntityCollection;
use src\Data\Models\Film;

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

                $film = new Film();

                $film
                    ->setTitle($films[$key]['title'])
                    ->setEpisodeId($films[$key]['episode_id'])
                    ->setOpeningCrawl($films[$key]['opening_crawl'])
                    ->setDirector($films[$key]['director'])
                    ->setProducer($films[$key]['producer'])
                    ->setReleaseDate($films[$key]['release_date'])
                    ->setSpecies($films[$key]['species'])
                    ->setVehicles($films[$key]['vehicles'])
                    ->setStarships($films[$key]['starships'])
                    ->setCharacters($films[$key]['characters'])
                    ->setPlanets($films[$key]['planets'])
                    ->setUrl($films[$key]['url'])
                    ->setCreated($films[$key]['created'])
                    ->setEdited($films[$key]['edited']);

                $filmCollection->tack($film);
            }
        }

        return $filmCollection;
    }
}
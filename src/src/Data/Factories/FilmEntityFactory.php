<?

namespace src\Data\Factories;

use src\Data\Entities\Film;

class FilmEntityFactory
{
    public static function make(array $data): Film
    {
        $film = new Film();

        $film
            ->setTitle($data['title'])
            ->setEpisodeId($data['episode_id'])
            ->setOpeningCrawl($data['opening_crawl'])
            ->setDirector($data['director'])
            ->setProducer($data['producer'])
            ->setReleaseDate($data['release_date'])
            ->setSpecies($data['species'])
            ->setVehicles($data['vehicles'])
            ->setStarships($data['starships'])
            ->setCharacters($data['characters'])
            ->setPlanets($data['planets'])
            ->setUrl($data['url'])
            ->setCreated($data['created'])
            ->setEdited($data['edited']);
            
        return $film;
    }
}
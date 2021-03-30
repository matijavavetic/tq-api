<?

namespace src\Data\Repositories\Contracts;

use src\Data\Mappers\FilmEntityCollection;

interface FilmRepositoryInterface
{
    public function findAllByCharacterUrl(string $characterUrl): FilmEntityCollection;    
}
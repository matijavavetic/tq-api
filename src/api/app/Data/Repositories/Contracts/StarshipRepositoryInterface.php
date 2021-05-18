<?

namespace src\Data\Repositories\Contracts;

use src\Data\Mappers\StarshipEntityCollection;

interface StarshipRepositoryInterface
{
    public function list(?int $passengers): StarshipEntityCollection;
}
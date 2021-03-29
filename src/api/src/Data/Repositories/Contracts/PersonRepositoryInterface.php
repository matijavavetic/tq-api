<?

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Person;

interface PersonRepositoryInterface
{
    public function findOneByName(string $name): ?Person;   
}
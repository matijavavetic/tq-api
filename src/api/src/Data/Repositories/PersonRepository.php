<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Data\Entities\Person;
use src\Data\Enums\SWApiEndpoint;
use src\Data\Factories\PersonEntityFactory;

class PersonRepository extends AbstractRepository implements PersonRepositoryInterface
{
    public function findOneByName(string $name): ?Person
    {
        $results = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PEOPLE), $name);

        $person = null;

        if (! empty($results)) {
            foreach ($results as $result) {
                $person = PersonEntityFactory::make($result);
            }
        }

        return $person;
    }
}
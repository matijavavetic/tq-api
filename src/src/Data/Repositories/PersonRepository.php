<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Data\Entities\Person;
use src\Data\Enums\SWApiEndpoint;

class PersonRepository extends AbstractRepository implements PersonRepositoryInterface
{
    public function findOneByName(string $name): ?Person
    {
        $response = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PEOPLE), $name);

        $person = null;

        if (! empty($response['results'])) {
            foreach ($response['results'] as $personData) {
                $person = $this->create($personData);
            }
        }

        return $person;
    }

    public function create(array $personData): Person
    {
        $person = new Person(); 

        $person
            ->setName($personData['name'])
            ->setHeight($personData['height'])
            ->setMass($personData['mass'])
            ->setHairColor($personData['hair_color'])
            ->setSkinColor($personData['skin_color'])
            ->setEyeColor($personData['eye_color'])
            ->setBirthYear($personData['birth_year'])
            ->setGender($personData['gender'])
            ->setHomeWorld($personData['homeworld'])
            ->setFilms($personData['films'])
            ->setSpecies($personData['species'])
            ->setVehicles($personData['vehicles'])
            ->setStarships($personData['starships'])
            ->setCreated($personData['created'])
            ->setEdited($personData['edited'])
            ->setUrl($personData['url']);

        return $person;
    }
}
<?

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Data\Models\Person;

class PersonRepository extends AbstractRepository implements PersonRepositoryInterface
{
    public function findOneByName(string $name): ?Person
    {
        $response = $this->apiClient->fetchPeople($name);

        $person = null;

        if (! empty($response['results'])) {
            foreach ($response['results'] as $personData) {
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
            }
        }

        return $person;
    }
}
<?

namespace src\Data\Factories;

use src\Data\Entities\Person;

class PersonEntityFactory
{
    public static function make(array $data): Person
    {
        $person = new Person(); 

        $person
            ->setName($data['name'])
            ->setHeight($data['height'])
            ->setMass($data['mass'])
            ->setHairColor($data['hair_color'])
            ->setSkinColor($data['skin_color'])
            ->setEyeColor($data['eye_color'])
            ->setBirthYear($data['birth_year'])
            ->setGender($data['gender'])
            ->setHomeWorld($data['homeworld'])
            ->setFilms($data['films'])
            ->setSpecies($data['species'])
            ->setVehicles($data['vehicles'])
            ->setStarships($data['starships'])
            ->setCreated($data['created'])
            ->setEdited($data['edited'])
            ->setUrl($data['url']);

        return $person;
    }
}
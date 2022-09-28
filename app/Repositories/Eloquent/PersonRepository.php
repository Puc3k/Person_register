<?php

namespace App\Repositories\Eloquent;

use App\Models\Person;
use App\Repositories\PersonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PersonRepository implements PersonInterface
{
    protected Person $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function getAllPersons(): Collection
    {
        return Person::all();
    }

    public function storePerson(array $data): void
    {
        $person = new Person();
        $person->name = $data['name'];
        $person->surname = $data['surname'];
        $person->age = $data['age'];
        $person->gender = $data['gender'];
        $person->postal_code = $data['postal_code'];
        $person->city = $data['city'];
        $person->street = $data['street'];
        $person->house_number = $data['house_number'];
        $person->save();
    }

    public function updatePerson(array $data, int $personId): void
    {
        $person = $this->person->find($personId);
        $person->name = $data['name'];
        $person->surname = $data['surname'];
        $person->age = $data['age'];
        $person->gender = $data['gender'];
        $person->postal_code = $data['postal_code'];
        $person->city = $data['city'];
        $person->street = $data['street'];
        $person->house_number = $data['house_number'];
        $person->update();
    }

    public function deletePerson(int $personId): Collection
    {
        $person = $this->person->find($personId);
        $person->delete();

        return $person;
    }

    public function filterBy(?string $phrase, int $size = 15): LengthAwarePaginator
    {
        $query = $this->person
            ->orderBy('name');

        if ($phrase) {
            $query->whereRaw('name like ?', ["$phrase%"])
                ->orWhereRaw('surname like ?', ["$phrase%"])
                ->orWhereRaw('age like ?', ["$phrase%"])
                ->orWhereRaw('gender like ?', ["$phrase%"])
                ->orWhereRaw('postal_code like ?', ["$phrase%"])
                ->orWhereRaw('city like ?', ["$phrase%"])
                ->orWhereRaw('street like ?', ["$phrase%"])
                ->orWhereRaw('house_number like ?', ["$phrase%"]);
        }

        return $query
            ->paginate($size);
    }
}

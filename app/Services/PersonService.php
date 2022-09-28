<?php

namespace App\Services;

use App\Repositories\Eloquent\PersonRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PersonService
{
    protected PersonRepository $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAllPersons(): Collection
    {
        return $this->personRepository->getAllPersons();
    }

    public function deletePerson(int $personId): array
    {
        try {
            $person = $this->personRepository->deletePerson($personId);
        } catch (\Throwable) {
            DB::rollback();
        }

        return $person ?? [];
    }

    public function storePerson(array $data): void
    {
        $this->personRepository->storePerson($data);
    }

    public function updatePerson(array $data, int $personId): void
    {
        $this->personRepository->updatePerson($data, $personId);
    }

    public function filterBy(?string $phrase, int $size = 15)
    {
        return $this->personRepository->filterBy($phrase, $size);
    }

}

<?php

namespace App\Repositories;

interface PersonInterface
{
    public function getAllPersons();

    public function storePerson(array $data);

    public function updatePerson(array $data, int $personId);

    public function deletePerson(int $personId);

    public function filterBy(?string $phrase, int $size = 15);
}

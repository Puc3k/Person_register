<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\PersonService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class PersonsController extends Controller
{
    protected PersonService $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function index(Request $request): View
    {
        $phrase = $request->get('phrase');
        $size = $request->get('size', 15);

        $persons = $this->personService->filterBy($phrase, $size);
        $persons->appends([
            'phrase' => $phrase,
        ]);

        return view('persons.index', [
            'persons' => $persons,
            'phrase' => $phrase
        ]);
    }


    public function create(): View
    {
        return view('persons.store');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'age' => 'required|numeric',
            'gender' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'street' => 'required|max:255',
            'house_number' => 'required|max:255',
        ]);

        $this->personService->storePerson($data);

        return redirect()->route('persons.index')->with('success', 'Rekord prawidłowo dodany.');
    }

    public function edit(Person $person): View
    {
        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, int $personId): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'age' => 'required|numeric',
            'gender' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'street' => 'required|max:255',
            'house_number' => 'required|max:255',
        ]);

        $this->personService->updatePerson($data, $personId);

        return redirect()->route('persons.index')->with('success', 'Rekord prawidłowo zaktualizowany.');
    }

    public function destroy(int $personId): RedirectResponse
    {
        try {
            $this->personService->deletePerson($personId);
        } catch (Throwable) {
        }
        return redirect()->route('persons.index')->with('success', 'Rekord pomyślnie usunięty.');
    }
}

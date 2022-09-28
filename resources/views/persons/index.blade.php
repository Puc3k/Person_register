@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3 mt-3 border-bottom d-flex flex-row justify-content-between">
            <div class="float-start">
                <h1>Rejestr osób</h1>
            </div>
            <div>
                <form>
                    <div class="form-row d-inline-flex align-items-center">
                        <label for="phrase" class="mx-3">Szukana fraza:</label>
                        <div class="col mx-3">
                            <input type="text" class="form-control" name="phrase" placeholder=""
                                   value="{{ $phrase ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Wyszukaj</button>
                    </div>
                </form>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('persons.create') }}"> Dodaj nową osobe</a>
            </div>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Wiek</th>
            <th scope="col">Płeć</th>
            <th scope="col">Miasto</th>
            <th scope="col">Kod pocztowy</th>
            <th scope="col">Ulica</th>
            <th scope="col">Numer domu</th>
            <th scope="col">Modyfikacja</th>
        </tr>
        </thead>
        <tbody>
        @foreach($persons ?? [] as $person)
            <tr class="text-center">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $person->name }}</td>
                <td>{{ $person->surname }}</td>
                <td>{{ $person->age }}</td>
                <td>{{ $person->gender }}</td>
                <td>{{ $person->city }}</td>
                <td>{{ $person->postal_code }}</td>
                <td>{{ $person->street }}</td>
                <td>{{ $person->house_number }}</td>
                <td>
                    <form action="{{ route('persons.destroy', $person->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info" href="{{ route('persons.edit',$person->id) }}">Edytuj</a>
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $persons->links("pagination::bootstrap-4") }}

@endsection

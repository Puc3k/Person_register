@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3 mt-3 border-bottom">
            <div class="float-start">
                <h1>Edycja osoby</h1>
            </div>
        </div>
    </div>
    <form action="{{ route('persons.update',$person->id) }}" method="POST">
        @csrf
        @method("PUT")
        <table class="table table-dark me-0">
            <thead>
            <tr>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Wiek</th>
                <th scope="col">Płeć</th>
                <th scope="col">Miasto</th>
                <th scope="col">Kod pocztowy</th>
                <th scope="col">Ulica</th>
                <th scope="col">Numer mieszkania</th>
                <th scope="col">Modyfikacja</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" name="name" value="{{$person->name}}" placeholder="Imie"/></td>
                <td><input type="text" name="surname" value="{{$person->surname}}" placeholder="Nazwisko"/></td>
                <td><input type="number" name="age" value="{{$person->age}}" placeholder="Wiek"/></td>
                <td><input type="text" name="city" value="{{$person->city}}" placeholder="Miasto"/></td>
                <td><input type="text" name="gender" value="{{$person->gender}}" placeholder="Płeć"/></td>
                <td><input type="text" name="postal_code" pattern="^\d{2}-\d{3}$" value="{{$person->postal_code}}"
                           placeholder="Kod pocztowy"/></td>
                <td><input type="text" name="street" value="{{$person->street}}" placeholder="Ulica"/></td>
                <td><input type="text" name="house_number" value="{{$person->house_number}}"
                           placeholder="Numer mieszkania"/></td>
                <td>
                    <button type="submit" class="btn btn-info">Zapisz</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
@endsection

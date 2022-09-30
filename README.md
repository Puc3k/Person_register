<h2 align="center">Mini-projekt “Rejestr osobowy” - projekt na studia</h2>


## Przykładowa instalacja Win10
Wymagane:
https://nodejs.org/en/download/
https://getcomposer.org/download/
https://www.apachefriends.org/pl/index.html
https://git-scm.com/book/pl/v2/Pierwsze-kroki-Instalacja-Git

Po sklonowaniu repozytorium:
- `cp .\.env.example .env` 
- `composer install`
- `npm install`
- `php artisan key:generate`
- `php artisan migrate`
- należy stworzyć bazę danych `persons` 
- uruchomić usługę Apache oraz MySQL w XAMPP'ie
- `php artisan migrate`
- opcjonalnie w celu wypełnienia tabeli testowymi danymi `php artisan db:seed `
- `npm run dev`
- `php artisan serve`

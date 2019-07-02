# Ponavljanje za ispit - napredni PHP

Kreirati web aplikaciju za upravljanje predavanjima iz baze podataka __fakultet__. Potrebno je kreirati sljedeće stranice:

- stranicu s popisom svih predavanja
- stranicu s detaljima o pojedinom predavanju
- stranicu za unos novog predavanja
- stranicu za izmijenu postojećeg predavanja

Uz gore navedene stranice potrebno je još i implementirati brisanje predavanja.

## Instalacija 

Instalirati Laravel
`composer create-project --prefer-dist laravel/laravel ponavljanje-ispit-napredni-php`

## Konfiguracija

Podesiti podatke u `.env` za spajanje na bazu podataka
```dotenv
DB_DATABASE=fakultet
DB_USERNAME=root
DB_PASSWORD=
```

Podesiti character set i collation u `config/database.php`
```php
mysql' => [
    // ...
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    // ...
],
```

## Layout view

Kreirati `layouts\app.blade.php`
```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fakultet</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```

## Ruta

```
Definirat rutu u `routes/web.php`
```php
Route::resource('lecture', 'LectureController');
```

## Kontroler

Kreirat kontroler
`php artisan make:controller LectureController --resource`

## Model

Kreirat model
`php artisan make:model Models\\Lecture`

```php
class Lecture extends Model
{
    protected $table = 'pred';

    protected $primaryKey = 'sifPred';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [ 'sifPred', 'kratPred', 'nazPred', 'sifOrgjed', 'upisanoStud', 'brojSatiTjedno' ];
}
```

## Stranice

### Popis svih predavanja

Kontroler akcija
```php
public function index()
{
    $lectures = Lecture::orderBy('nazPred')->paginate(20);

    return view('lectures.index', [
        'lectures' => $lectures,
    ]);
}
```

Kreirat view u `lectures\index.blade.php`

### Stranica s detaljima o predavanju

Kontroler akcija
```php
public function show($id)
{
    $lecture = Lecture::find($id);

    if (!$lecture) {
        abort(404);
    }

    return view('lectures.show', [
        'lecture' => $lecture,
    ]);
}
```

View `lectures/show.blade.php`

### Stranica za unos novog predavanja

Kontroler `create()` akcija
```php
public function create()
{
    return view('lectures.create');
}
```

View `lectures/create.blade.php`

Napraviti _form request_ za validaciju
`php artisan make:request LectureRequest`

`authorize()` treba vraćati `true`

Pravila validacije
```php
public function rules()
{
    return [
        'sifPred' => 'required',
        'kratPred' => 'nullable|max:8',
        'nazPred' => 'required|max:60',
        'sifOrgjed' => 'nullable|integer',
        'upisanoStud' => 'nullable|integer|min:0',
        'brojSatiTjedno' => 'nullable|integer|min:0',
    ];
}
```

Kontroler `store()` akcija
```php
public function store(LectureRequest $request)
{
    Lecture::create($request->all());

    return redirect()->route('lectures.index')->with([
        'success' => 'Predavanje uspješno spremljeno'
    ]);
}
```

### Stranica za izmjenu postojećeg predavanja

Kontroler `edit()` akcija
```php
public function edit($id)
{
    $lecture = Lecture::find($id);

    if (!$lecture) {
        abort(404);
    }

    return view('lectures.edit', [
        'lecture' => $lecture,
    ]);
}
```

View `lectures/edit.blade.php`, kopirati iz `create.blade.php` i izmijeniti
- action atribut forme `{{ route('lectures.update', $lecture->sifPred) }}`
- dodati `@method('PATCH')` unutar forme
- izmijeniti value od inputa `{{ old('sifPred') ? old('sifPred') : $lecture->sifPred }}`

Kontroler `update()` akcija
```php
public function update(LectureRequest $request, $id)
{
    $lecture = Lecture::find($id);

    if (!$lecture) {
        abort(404);
    }

    $lecture->fill($request->all());
    $lecture->save();

    return redirect()->route('lectures.index')->with([
        'success' => 'Predavanje uspješno ažurirano'
    ]);
}
```

### Brisanje predavanja

Kontroler akcija
```php
public function destroy($id)
{
    Lecture::destroy($id);

    return redirect()->route('lectures.index')->with([
        'success' => 'Predavanje uspješno izbrisano'
    ]);
}
```

## Pokretanje aplikacije

Pokretanje ugrađenog web poslužitelja
`php artisan serve`
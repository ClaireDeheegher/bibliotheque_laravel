    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Models\Book;
    use App\Models\Author as Author;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {});

    Route::prefix('/livres')->name('livres.')->group(function () {
        Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('index');
        Route::post('/create', [\App\Http\Controllers\BookController::class, 'create'])->name('create');
        Route::post('/update', [\App\Http\Controllers\BookController::class, 'update'])->name('update');
        Route::post('/delete', [\App\Http\Controllers\BookController::class, 'delete'])->name('delete');
        Route::get('/{id}', [\App\Http\Controllers\BookController::class, 'show'])->name('show');
    });
    Route::prefix('/auteurs')->name('auteurs')->group(function () {
        Route::get('/', [\App\Http\Controllers\AuthorController::class, 'index'])->name('index');
        Route::post('/create', [\App\Http\Controllers\AuthorController::class, 'create'])->name('create');
        Route::post('/update', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update');
        Route::post('/delete', [\App\Http\Controllers\AuthorController::class, 'delete'])->name('delete');
        Route::get('/{id}', [\App\Http\Controllers\AuthorController::class, 'show'])->name('show');
    });





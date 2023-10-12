<?php
use App\Http\Controllers\{
    ProfileController,
    AdminController,
    AboutController,
    InscripcionController,
    StaffController,
    JugadorController,
    JugadorExtranjeroController,
    InfoController,
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Página Principal
Route::get('/', function () {
    if (Auth::check() && Auth::user()->role == 'admin') {
        return view('admin.index');
    }
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Acerca de
Route::get('/about', [AboutController::class, 'index'])->name('footer');

// Inscripciones
Route::get('/inscripciones', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class,'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class,'StoreProfile'])->name('store.profile');
    Route::post('/changedata/profile', [AdminController::class,'ChangeProfileData'])->name('changedata.profile');
    Route::get('/change/password', [AdminController::class,'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class,'UpdatePassword'])->name('update.password');
    Route::get('/admin/users', [AdminController::class,'AdminController@users'])->name('admin.users');
});

// Perfil de Usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sedes
Route::get('/sedes', function () {
    return view('sedes');
});

// Jugadores
Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
Route::get('/equipos/{sede_id}', [JugadorController::class, 'getEquipos']) ->name('equipos.getEquipos');
Route::get('/jugadores/getTodos', [JugadorController::class, 'getTodos']) ->name('jugadores.getTodos');
Route::get('/jugadores/{equipo_id}', [JugadorController::class, 'getJugadores']) ->name('jugadores.getJugadores');

// Staff
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');
    
//rutas jugadoresExtranjeros
Route::get('/historia', [JugadorExtranjeroController::class, 'index'])->name('historia.index');

// Horarios
Route::get('/horarios', function () {
    return view('horarios');
})->name('horarios.index');

// Información
Route::get('/info', [InfoController::class, 'index']);

// Rutas de Autenticación
require __DIR__.'/auth.php';
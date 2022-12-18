<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\PreinscripcionController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PlazoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::group([], function () {}); 

/*Home  GUEST Routes*/
Route::get('/', function () {
    return view('home');
});

/*Posts Open */
Route::get("/", [PostController::class, 'indexNews'])->name('home');
Route::get("/news/{post}", [PostController::class, 'showOpenPost'])->name('posts.open.showOpenPost.show');
Route::get("/inscripcion/{post}", [PostController::class, 'showInscripcionPost'])->name('posts.open.showInscripcionPost.show');
Route::get("/preinscripcion/{post}", [PostController::class, 'showPreinscripcionPost'])->name('posts.open.showPreinscripcionPost.show');
Route::get("/plazasLibres/{post}", [PostController::class, 'showPlazasLibresPost'])->name('posts.open.showPlazasLibresPost.show');
Route::get("/actividades/libres", [ActividadController::class, 'showActividadesLibres'])->name('actividads.open.showActividadesLibres.show');
Route::get("/actividades/all", [ActividadController::class, 'showActividadesAll'])->name('actividads.open.showActividadesAll.show');
Route::get("/actividades/horarios", [ActividadController::class, 'showHorariosAll'])->name('actividads.open.showHorariosAll.show');



Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});


/*Dashboard */
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
Route::get('/profile', function () {
    // Only authenticated users may enter...
    return view('dashboard/{{-- {{Auth::user()->id}} --}}');
})->middleware('auth');
*/

// Logged-in users - with "auth" middleware
// Route::middleware('auth')->group(function () {

// Route::middleware(['auth', 'auth.session'])->group(function (){    
Route::middleware(['auth', 'verified'])->group(function (){
  
   
    // /user/XXX: In addition to "auth", this group will have middleware "simple_users"
    //  Route::group(['middleware' => ['simple_users'], 'prefix' => 'user'], function () {
        Route::resources([
            'actividads'=> ActividadController::class,
            'users' => UserController::class,
            'monitors'=> MonitorController::class,
            'participantes'=>ParticipanteController::class,
            'preinscripcions'=>PreinscripcionController::class,
            'inscripcions'=>InscripcionController::class,
            'posts'=>PostController::class,
            'plazos'=>PlazoController::class,
            'permissions'=>PermissionController::class,
            'roles'=>RoleController::class,
        ]);
    

    // /admin/XXX: This group won't have "simple_users", but will have "auth" and "admins"
    /*
    Route::group(['middleware' => ['admins'], 'prefix' => 'admin'], function () {
        Route::resource('users', 'UserController');
    });
    */
});


/* Rutas Adicionales de Usuario */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get("/profile/{user}/edit", [UserController::class, 'editProfile'])->name('users.profile.edit');
    Route::put("/profile/{user}", [UserController::class, 'updateProfile'])->name('users.profile.update');
    Route::get("/profile/{user}", [UserController::class, 'showProfile'])->name('users.profile.show');
    Route::get("/profile/{user}/edit/password", [UserController::class, 'editPasswordProfile'])->name('users.profilePassword.edit');
    Route::put("/profile/{user}/password", [UserController::class, 'updatePasswordProfile'])->name('users.profilePassword.update');
    Route::delete("/profile/{user}", [UserController::class, 'destroyProfile'])->name('users.profile.destroy');
    Route::get("/ajustes", [UserController::class, 'ajustes'])->name('users.ajustes');
    /*Dashboard*/
     Route::get("/dashboard", [UserController::class, 'panelIndex'])->name('dashboard');


});

/* Rutas Adicionales de Posts, Abrir Plazos Post,Preinscripción Plazas y Cerrar Plazos auth verified */
Route::middleware(['auth', 'verified'])->group(function () {

    /*Asignar Plaza Preinscripción*/
    Route::get("/plazasPreinscripcions", [PreinscripcionController::class, 'indexAsignarPlazasPre'])->name('preinscripcions.indexAsignarPlazasPre.index');
    Route::get("/plazasPreinscripcions/listadosPlazas", [PreinscripcionController::class, 'listadosPlazasPreinscripcion'])->name('preinscripcions.listadosPlazasPreinscripcion.index');
    Route::get("/plazasPreinscripcions/asignarPlaza/edit", [PreinscripcionController::class, 'asignarPlazasPreinscripcion'])->name('preinscripcions.asignarPlazasPreinscripcion.edit');
    Route::put("/plazasPreinscripcions/asignarPlaza/", [PreinscripcionController::class, 'updateAsignarPlazasPreinscripcion'])->name('preinscripcions.updateAsignarPlazasPreinscripcion.update');
    Route::get("/plazasPreinscripcions/asignarPlazaSuperadas/edit", [PreinscripcionController::class, 'asignarPlazasPreSuperadas'])->name('preinscripcions.asignarPlazasPreSuperadas.edit');
    Route::put("/plazasPreinscripcions/asignarPlazaSuperadas/", [PreinscripcionController::class, 'updateAsignarPlazasPreSuperadas'])->name('preinscripcions.updateAsignarPlazasPreSuperadas.update');
   

    /*-- Posts Apertura Plazos --*/
    Route::get("/abrirPlazos", [PostController::class, 'abrirPlazos'])->name('posts.abrirPlazos.index');
    /*Posts Abrir Inscripciones*/
    Route::get("/abrirPlazos/inscripcion", [PostController::class, 'createInscripcion'])->name('posts.abrir.createInscripcion.create');
    Route::post("/abrirPlazos/inscripcion", [PostController::class, 'storeInscripcion'])->name('posts.abrir.storeInscripcion.store');
    Route::get("/abrirPlazos/inscripcion/{post}/edit", [PostController::class, 'editInscripcion'])->name('posts.abrir.editInscripcion.edit');
    Route::put("/abrirPlazos/inscripcion/{post}", [PostController::class, 'updateInscripcion'])->name('posts.abrir.updateInscripcion.update');
    /*Posts Abrir Preinscripciones*/
    Route::get("/abrirPlazos/preinscripcion", [PostController::class, 'createPreinscripcion'])->name('posts.abrir.createPreinscripcion.create');
    Route::post("/abrirPlazos/preinscripcion", [PostController::class, 'storePreinscripcion'])->name('posts.abrir.storePreinscripcion.store');
    Route::get("/abrirPlazos/preinscripcion/{post}/edit", [PostController::class, 'editPreinscripcion'])->name('posts.abrir.editPreinscripcion.edit');
    Route::put("/abrirPlazos/preinscripcion/{post}", [PostController::class, 'updatePreinscripcion'])->name('posts.abrir.updatePreinscripcion.update');
    /*Posts Abrir PlazasLibres*/
    Route::get("/abrirPlazos/plazasLibres", [PostController::class, 'createPlazasLibres'])->name('posts.abrir.createPlazasLibres.create');
    Route::post("/abrirPlazos/plazasLibres", [PostController::class, 'storePlazasLibres'])->name('posts.abrir.storePlazasLibres.store');
    Route::get("/abrirPlazos/plazasLibres/{post}/edit", [PostController::class, 'editPlazasLibres'])->name('posts.abrir.editPlazasLibres.edit');
    Route::put("/abrirPlazos/plazasLibres/{post}", [PostController::class, 'updatePlazasLibres'])->name('posts.abrir.updatePlazasLibres.update');
      
    
    /*-- Post Cerrar Plazos --*/
    Route::get("/cerrarPlazos", [PostController::class, 'cerrarPlazos'])->name('posts.cerrarPlazos.index');
    /*Posts Cerrar Inscripciones*/
    Route::get("/cerrarPlazos/inscripcion", [PostController::class, 'createCerrarInscripcion'])->name('posts.cerrar.createCerrarInscripcion.create');
    Route::post("/cerrarPlazos/inscripcion", [PostController::class, 'storeCerrarInscripcion'])->name('posts.cerrar.storeCerrarInscripcion.store');
    Route::get("/cerrarPlazos/inscripcion/{post}/edit", [PostController::class, 'editCerrarInscripcion'])->name('posts.cerrar.editCerrarInscripcion.edit');
    Route::put("/cerrarPlazos/inscripcion/{post}", [PostController::class, 'updateCerrarInscripcion'])->name('posts.cerrar.updateCerrarInscripcion.update');
    /*Posts Cerrar Preinscripciones*/
    Route::get("/cerrarPlazos/preinscripcion", [PostController::class, 'createCerrarPreinscripcion'])->name('posts.cerrar.createCerrarPreinscripcion.create');
    Route::post("/cerrarPlazos/preinscripcion", [PostController::class, 'storeCerrarPreinscripcion'])->name('posts.cerrar.storeCerrarPreinscripcion.store');
    Route::get("/cerrarPlazos/preinscripcion/{post}/edit", [PostController::class, 'editCerrarPreinscripcion'])->name('posts.cerrar.editCerrarPreinscripcion.edit');
    Route::put("/cerrarPlazos/preinscripcion/{post}", [PostController::class, 'updateCerrarPreinscripcion'])->name('posts.cerrar.updateCerrarPreinscripcion.update');
    /*Posts Cerrar PlazasLibres*/
    Route::get("/cerrarPlazos/plazasLibres", [PostController::class, 'createCerrarPlazasLibres'])->name('posts.cerrar.createCerrarPlazasLibres.create');
    Route::post("/cerrarPlazos/plazasLibres", [PostController::class, 'storeCerrarPlazasLibres'])->name('posts.cerrar.storeCerrarPlazasLibres.store');
    Route::get("/cerrarPlazos/plazasLibres/{post}/edit", [PostController::class, 'editCerrarPlazasLibres'])->name('posts.cerrar.editCerrarPlazasLibres.edit');
    Route::put("/cerrarPlazos/plazasLibres/{post}", [PostController::class, 'updateCerrarPlazasLibres'])->name('posts.cerrar.updateCerrarPlazasLibres.update');
     

});

/* Rutas Adicionales de Posts GUEST */
Route::middleware(['auth', 'guest'])->group(function () {


});

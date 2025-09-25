<?php

use App\Http\Controllers\LandingController; // landing pública
use App\Http\Controllers\Panel\LandingController as PanelLandingController; // panel
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\DoctorSantanaController as PanelDoctorSantanaController; // panel Dr. Santana
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InventarioController;

use App\Http\Controllers\UserController;

Route::get('/dashboard', function () {
    return view('panel.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Mostrar landing pública
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
//Clinicas Capilar Elite
Route::get('/clinicas/santafe', [LandingController::class, 'clinicaSantafe'])->name('landing.santafe');
Route::get('/clinicas/pedregal', [LandingController::class, 'clinicaPedregal'])->name('landing.pedregal');
Route::get('/clinicas/queretaro', [LandingController::class, 'clinicaQueretaro'])->name('landing.queretaro');

// Dr. Santana
Route::get('/dr-santana', [LandingController::class, 'drSantana'])->name('landing.dr_santana');

/*Route::get('/dr-santana', function () {
    return view('landing.dr_santana'); // nombre de la vista
})->name('dr-santana');*/



Route::prefix('panel')->name('panel.')->middleware(['auth'])->group(function () {

    Route::get('usuarios/create', [RegisteredUserController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios/store', [RegisteredUserController::class, 'store'])->name('usuarios.store');

    Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::delete('usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::get('usuarios/{user}', [UserController::class, 'show'])->name('usuarios.show');
    // Listar empleados (vista principal)
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

    // Crear empleado
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

    // Editar empleado (formulario modal enviado con PUT)
    Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');

    // Eliminar empleado
    Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
    Route::get('usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::delete('usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    route::get('/landing', [PanelLandingController::class, 'index'])->name('landing.index');
    // Crear resultado público (opcional, si lo necesitas)
    Route::get('/landing/resultados/create', [PanelLandingController::class, 'createResultado'])->name('landing.resultado.create');
    Route::post('/landing/resultados', [PanelLandingController::class, 'storeResultado'])->name('landing.resultado.store');

    //rutas de inventario
    Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/api/products', [InventarioController::class, 'getProducts']);
    Route::post('inventario/movimiento', [InventarioController::class, 'movimientoInv'])->name('inventario.movimiento');


    // crear encabezado
    Route::post('landing/encabezado', [PanelLandingController::class, 'storeEncabezado'])->name('landing.encabezado.store');
    Route::put('landing/encabezado/{encabezado}', [PanelLandingController::class, 'updateEncabezado'])->name('landing.encabezado.update');
    // eliminar encabezado
    Route::delete('landing/encabezado/{encabezado}', [PanelLandingController::class, 'destroyEncabezado'])->name('landing.encabezado.destroy');
    Route::post('landing/encabezado', [PanelLandingController::class, 'storeEncabezado'])->name('landing.encabezado.store');
    //Rutas de blog
    Route::post('landing/blog', [PanelLandingController::class, 'createBlog'])->name('landing.blog.store');
    Route::put('landing/blog/{blog}', [PanelLandingController::class, 'editBlog'])->name('landing.blog.update');
    //eliminar blog
    Route::delete('landing/blog/{blog}', [PanelLandingController::class, 'destroyBlog'])->name('landing.blog.destroy');

    //Rutas de servicios
    Route::post('landing/servicios', [PanelLandingController::class, 'createServicios'])->name('landing.servicios.store');
    Route::put('landing/servicios/{servicios}', [PanelLandingController::class, 'editServicios'])->name(name: 'landing.servicios.update');
    //eliminar servicios
    Route::delete('landing/servicios/{servicios}', [PanelLandingController::class, 'destroyServicios'])->name('landing.servicios.destroy');

    Route::get('/', [PanelController::class, 'index'])->name('panel.index');
    Route::get('/landing', [PanelLandingController::class, 'index'])->name('landing.index');
    Route::get('/landing/resultados/create', [PanelLandingController::class, 'createResultado'])->name('landing.resultado.create');
    Route::post('/landing/resultados', [PanelLandingController::class, 'storeResultado'])->name('landing.resultado.store');
    Route::put('/landing/resultados/{resultado}', [PanelLandingController::class, 'update'])->name('landing.resultado.update');
    // Quiénes Somos
    Route::post('landing/quienes_somos', [panelLandingController::class, 'storeQuienesSomos'])->name('landing.quienes_somos.store');
    Route::put('landing/quienes_somos/{quienes_somos}', [LandingController::class, 'updateQuienesSomos'])->name('landing.quienes_somos.update');

    // Casos de Éxito
    Route::get('casos-exito', [PanelLandingController::class, 'indexCasoexito'])->name('casos.index');
    Route::post('casos-exito', [PanelLandingController::class, 'storeExito'])->name('casos.store');
    Route::put('casos-exito/{caso}', [PanelLandingController::class, 'updateExito'])->name('casos.update');
    Route::delete('casos-exito/{caso}', [PanelLandingController::class, 'destroyExito'])->name('casos.destroy');


    //Rutas del panel del DRSantana

    //index DrSantana
    Route::get('/doctor-santana', [PanelDoctorSantanaController::class, 'indexDrsantana'])->name('drsantana.index');

    // Blog
    Route::post('/doctor-santana/blog', [PanelDoctorSantanaController::class, 'storeBlogdr'])->name('drsantana.blog.store');
    Route::put('/doctor-santana/blog/{blog}', [PanelDoctorSantanaController::class, 'updateBlogdr'])->name('drsantana.blog.update');
    Route::delete('/doctor-santana/blog/{blog}', [PanelDoctorSantanaController::class, 'destroyBlogdr'])->name('drsantana.blog.destroy');
    //Route::get('/doctor-santana/blog', [PanelDoctorSantanaController::class, 'getBlogsdr'])->name('drsantana.blog.list');

    // Trayectoria
    Route::post('/doctor-santana/trayectoria', [PanelDoctorSantanaController::class, 'storeTrayectoria'])->name('drsantana.trayectoria.store');
    Route::put('/doctor-santana/trayectoria/{trayectoria}', [PanelDoctorSantanaController::class, 'updateTrayectoria'])->name('drsantana.trayectoria.update');

    // Galería
    Route::post('/doctor-santana/galeria', [PanelDoctorSantanaController::class, 'storeGaleria'])->name('drsantana.galeria.store');
    Route::put('/doctor-santana/galeria/{galeria}', [PanelDoctorSantanaController::class, 'updateGaleria'])->name('drsantana.galeria.update');
    Route::delete('/doctor-santana/galeria/{galeria}', [PanelDoctorSantanaController::class, 'destroyGaleria'])->name('drsantana.galeria.destroy');

    // Certificaciones
    //Route::get('/doctor-santana/certificaciones', [PanelDoctorSantanaController::class, 'indexCertificaciones'])->name('certificaciones.index');
    Route::post('/certificaciones', [PanelDoctorSantanaController::class, 'CerStore'])->name('certificaciones.store');
    Route::put('/certificaciones/{id}', [PanelDoctorSantanaController::class, 'CerUpdate'])->name('certificaciones.update');
    Route::delete('/certificaciones/{id}', [PanelDoctorSantanaController::class, 'CerDestroy'])->name('certificaciones.destroy');

    Route::post('/doctor-santana/blog/{blog}', [PanelDoctorSantanaController::class, 'destroyBlog'])->name('drsantana.blog.destroy');
    // Contacto
    Route::post('/doctor-santana/contacto', [PanelDoctorSantanaController::class, 'storeContacto'])->name('drsantana.contacto.store');
    Route::put('/doctor-santana/contacto/{contacto}', [PanelDoctorSantanaController::class, 'updateContacto'])->name('drsantana.contacto.update');
    Route::delete('/doctor-santana/contacto/{contacto}', [PanelDoctorSantanaController::class, 'destroyContacto'])->name('drsantana.contacto.destroy');
});

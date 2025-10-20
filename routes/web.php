<?php

use App\Http\Controllers\LandingController; // landing pública
use App\Http\Controllers\Panel\LandingController as PanelLandingController; // panel
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\DoctorSantanaController as PanelDoctorSantanaController; // panel Dr. Santana
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\finanzasController;
use App\Http\Controllers\HubspotController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\BunnyController;

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

//Prueba del PDF
use Mpdf\Mpdf;

Route::get('/test-mpdf', function() {
    $mpdf = new Mpdf();
    $mpdf->WriteHTML('<h1>Hola Mundo</h1>');
    return $mpdf->Output('test.pdf', 'I');
});



// Mostrar landing pública
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
//Clinicas Capilar Elite
Route::get('/clinicas/santafe', [LandingController::class, 'clinicaSantafe'])->name('landing.santafe');
Route::get('/clinicas/pedregal', [LandingController::class, 'clinicaPedregal'])->name('landing.pedregal');
Route::get('/clinicas/queretaro', [LandingController::class, 'clinicaQueretaro'])->name('landing.queretaro');
//Route::post('/contacto-hubspot', [HubspotController::class, 'submit'])->name('hubspot.submit');

// Dr. Santana
Route::get('/dr-santana', [LandingController::class, 'drSantana'])->name('landing.dr_santana');
//Equipo
Route::get('/equipo', [LandingController::class, 'equipo'])->name('landing.equipo');
// Tecnologías
Route::get('/tecnologias', [LandingController::class, 'tecnologias'])->name('landing.tecnologias');
//
Route::get('/servicios', [LandingController::class, 'servicios'])->name('landing.servicios');

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

    //rutas de inventarios
    Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/api/products', [InventarioController::class, 'getProducts']);
    Route::post('inventario/movimiento', [InventarioController::class, 'movimientoInv'])->name('inventario.movimiento');
    Route::put('inventario/update', [InventarioController::class, 'updateProd'])->name('inventario.update');
    Route::delete('inventario/destroy/{id}', [InventarioController::class, 'destroyProd'])->name('inventario.destroy');
    Route::post('inventario/salida', [InventarioController::class, 'salidaProducto'])->name('inventario.salida');
    //Kits medicos
    Route::get('/productos', [InventarioController::class, 'getProductos'])->name('getProductos'); // Trae todos los productos disponibles
    Route::get('/obtener', [InventarioController::class, 'getKit'])->name('getKit');         // Trae los productos del kit (por tipo y clínica)
    Route::post('/guardar', [InventarioController::class, 'guardarKit'])->name('guardarKit');    // Guarda o actualiza los kits

    //Salida rapida
    Route::post('/salidas-rapidas', [InventarioController::class, 'registrarSalidaRapida'])->name('salidas.rapidas');

    //Rutas de apartado de finanzas
    //Rutas de gastos
    Route::get('gastos', [finanzasController::class, 'indexGastos'])->name('gastos.index');
    Route::post('/gastos/guardarGasto', [finanzasController::class, 'guardarGasto'])->name('gastos.guardar');
    Route::put('/gastos/{id}', [finanzasController::class, 'actualizarGasto'])->name('gastos.actualizar');
    Route::delete('/gastos/{id}', [finanzasController::class, 'eliminarGasto'])->name('gastos.eliminar');
    //Suma de totales de gastos
    Route::get('/gastos/fechas', [finanzasController::class, 'getGastosPorFechas'])->name('gastos.fechas');

    //Rutas de ingresos
    Route::get('ingresos', [finanzasController::class, 'indexIngresos'])->name('ingresos.index');
    Route::get('ingresos-transacciones/data', [finanzasController::class, 'getTransacciones'])->name('ingresosTransacciones.data');

    //Rustas de cortes diarios
    Route::get('cortesDiarios', [finanzasController::class, 'indexCortesDiarios'])->name('cortesDiarios.index');
    Route::post('/load-all-daily', [finanzasController::class, 'loadAllDaily'])->name('corte.loadAllDaily');
    Route::post('/load-total-daily', [finanzasController::class, 'loadTotalDaily'])->name('corte.loadTotalDaily');
    Route::post('/add-sign', [finanzasController::class, 'addSignByDay'])->name('corte.addSignByDay');
    Route::post('/delete-sign', [finanzasController::class, 'deleteSignByDay'])->name('corte.deleteSignByDay');
    Route::post('/generate-cash-closing', [finanzasController::class, 'generateCashClosingDaily'])->name('corte.generateCashClosingDaily');

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
    Route::get('panel/casos/{id}/edit', [PanelLandingController::class, 'editCaso'])->name('casos.edit');
    Route::delete('casos-exito/{caso}', [PanelLandingController::class, 'destroyExito'])->name('casos.destroy');


    //Rutas del panel del DRSantana


    // Vista principal del panel Dr. Santana
    Route::get('/doctor-santana', [PanelDoctorSantanaController::class, 'indexDrsantana'])->name('drsantana.index');

    // Blog Dr. Santana
    Route::get('/doctor-santana/blog', [PanelDoctorSantanaController::class, 'indexsBlog'])->name('drsantana.blog.index'); // vista lista de blogs
    Route::get('/doctor-santana/blog/list', [PanelDoctorSantanaController::class, 'getBlogsdr'])->name('drsantana.blog.list'); // AJAX / JSON
    Route::post('/doctor-santana/blog', [PanelDoctorSantanaController::class, 'storeBlogdr'])->name('drsantana.blog.store');
    Route::put('/doctor-santana/blog/{id}', [PanelDoctorSantanaController::class, 'updateBlogdr'])->name('drsantana.blog.update');
    Route::delete('/doctor-santana/blog/{id}', [PanelDoctorSantanaController::class, 'destroyBlogdr'])->name('drsantana.blog.destroy');
    Route::put('/doctor-santana/blog/{blog}', [PanelDoctorSantanaController::class, 'updateBlogdr'])->name('drsantana.blog.update');
    //Route::delete('/doctor-santana/blog/{blog}', [PanelDoctorSantanaController::class, 'destroyBlogdr'])->name('drsantana.blog.destroy');
    //Route::get('/doctor-santana/blog', [PanelDoctorSantanaController::class, 'getBlogsdr'])->name('drsantana.blog.list');

    // Galería Dr. Santana
    Route::get('/doctor-santana/galeria', [PanelDoctorSantanaController::class, 'indexGaleria'])->name('drsantana.galeria.index');
    Route::post('/doctor-santana/galeria', [PanelDoctorSantanaController::class, 'storeGaleria'])->name('drsantana.galeria.store');
    Route::put('/doctor-santana/galeria/{galeria}', [PanelDoctorSantanaController::class, 'updateGaleria'])->name('drsantana.galeria.update');
    Route::delete('/doctor-santana/galeria/{galeria}', [PanelDoctorSantanaController::class, 'destroyGaleria'])->name('drsantana.galeria.destroy');

    // Trayectoria Dr. Santana
    Route::get('/doctor-santana/trayectoria', [PanelDoctorSantanaController::class, 'indexTrayectoria'])->name('drsantana.trayectoria.index');
    Route::post('/doctor-santana/trayectoria', [PanelDoctorSantanaController::class, 'storeTrayectoria'])->name('drsantana.trayectoria.store');
    Route::put('/doctor-santana/trayectoria/{trayectoria}', [PanelDoctorSantanaController::class, 'updateTrayectoria'])->name('drsantana.trayectoria.update');
    Route::delete('/doctor-santana/trayectoria/{trayectoria}', [PanelDoctorSantanaController::class, 'destroyTrayectoria'])->name('drsantana.trayectoria.destroy');

    // Resultados Dr. Santana
    Route::get('/doctor-santana/resultados', [PanelDoctorSantanaController::class, 'indexResultados'])->name('drsantana.resultados.index');
    Route::post('/doctor-santana/resultados', [PanelDoctorSantanaController::class, 'storeResultadoDR'])->name('drsantana.resultados.store');
    Route::put('/doctor-santana/resultados/{resultado}', [PanelDoctorSantanaController::class, 'updateResultadoDR'])->name('drsantana.resultados.update');

    // Contacto Dr. Santana
    Route::get('/doctor-santana/contacto', [PanelDoctorSantanaController::class, 'indexContacto'])->name('drsantana.contacto.index');
    Route::get('/doctor-santana/contacto/{contacto}', [PanelDoctorSantanaController::class, 'showContacto'])->name('drsantana.contacto.show');

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

//Rutas para BunnyCDN
Route::prefix('bunny')->group(function () {
    Route::get('/{lead_id}', [BunnyController::class, 'index'])->name('bunny.index');
    Route::get('listar/{lead_id}', [BunnyController::class, 'listar'])->name('bunny.listar');
    Route::post('subir', [BunnyController::class, 'subir'])->name('bunny.subir');
    Route::get('mostrar/{lead_id}/{archivo}', [BunnyController::class, 'mostrar'])->name('bunny.mostrar');
    Route::delete('borrar/{lead_id}/{archivo}', [BunnyController::class, 'borrar'])->name('bunny.borrar');
});



//Prueba de BunnyCDN
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

Route::get('/test-bunny', function () {
    $url = 'https://' . env('BUNNY_HOST') . '/' . env('BUNNY_STORAGE_ZONE') . '/';
    $apiKey = env('BUNNY_API_KEY');

    try {
        $response = Http::withHeaders([
            'AccessKey' => $apiKey,
        ])->get($url);

        if ($response->successful()) {
            return "✅ Conexión exitosa. Código de estado: " . $response->status();
        } else {
            return "❌ Error: " . $response->body();
        }
    } catch (\Exception $e) {
        return "⚠️ Excepción: " . $e->getMessage();
    }
});



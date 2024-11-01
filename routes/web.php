<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\BitacoraGuardaparqueController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\GuardaparqueController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SupervisaController;
use App\Http\Controllers\TipoEntradaController;
use App\Models\Guardaparque;
use App\Models\Horario;
use App\Models\Supervisa;
use App\Models\tipo_entrada;
use App\Http\Controllers\RutaController;
use App\Models\Ruta;
use App\Http\Controllers\ComentarioController;
use App\Models\Comentario;









Route::get('/rutas/{id}', [RutaController::class, 'show'])->name('rutas.show');
Route::get('/administradores/rutas', [RutaController::class, 'adminIndex'])->name('admin.rutas.index');
// Ruta para almacenar una nueva ruta (administrador)
Route::post('/administradores/rutas', [RutaController::class, 'store'])->name('admin.rutas.store');
// Ruta para el usuario - Vista solo para ver las rutas sin opciones de modificación
Route::get('/user/rutas', [RutaController::class, 'userIndex'])->name('user.rutas.index');
Route::put('/administradores/rutas/{id}', [RutaController::class, 'update'])->name('admin.rutas.update');
Route::delete('/administradores/rutas/{id}', [RutaController::class, 'destroy'])->name('admin.rutas.destroy');


// Ruta para la página de inicio
Route::get('/', function () {
    return redirect()->route('user.usuariotemplate');
});

// Rutas de usuario
Route::prefix('user')->group(function () {
    Route::get('/usuariotemplate', function () {
        return view('usuarioTemplate.index');
    })->name('user.usuariotemplate');

    Route::middleware(['auth:usuarios'])->group(function () {
        // Ruta para la vista del perfil del usuario
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
        Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
        Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil');
        Route::delete('/delete-profile-image', [UsuarioController::class, 'deleteProfileImage'])->name('deleteProfileImage');
        Route::put('/update-profile', [UsuarioController::class, 'updateProfile'])->name('updateProfile');
        Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
        Route::put('/usuarios/admin/{id}', [UsuarioController::class, 'updateAdmin'])->name('usuarios.admin.update');
        // Rutas para las comunidades
        // Ruta para acceder a la comunidad
        Route::get('/comunidad/villa_amboro/{id}', [ComunidadController::class, 'show_villa_amoboro'])->name('comunidad.show_villa_amoboro');
        Route::get('/comunidad/jardin_de_las_delicias/{id}', [ComunidadController::class, 'show_jardin_de_las_delicias'])->name('comunidad.show_jardin_de_las_delicias');
        Route::get('/comunidad/la_chonta/{id}', [ComunidadController::class, 'show_la_chonta'])->name('comunidad.show_la_chonta');
        Route::get('/comunidad/mataracu/{id}', [ComunidadController::class, 'show_mataracu'])->name('comunidad.show_mataracu');
        Route::get('/comunidad/oriente/{id}', [ComunidadController::class, 'show_oriente'])->name('comunidad.show_oriente');

        Route::get('/comentarios', [ComentarioController::class, 'indexUser'])->name('user.comentarios.index'); // Ver comentarios
        Route::post('/comentarios', [ComentarioController::class, 'store'])->name('user.comentarios.store'); // Crear un comentario
       
       



        Route::get('/usuario', function () {
            return view('usuarios.comunidad.villa_amboro');
        })->name('comunidades.villa_amboro');
        // Ruta para layouts de usuario
        Route::get('/layouts', function () {
            return view('layouts.template');
        })->name('layouts.template');
    });
});

// Rutas de administración
//prefix<=>RequestMapping()
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdministradorController::class, 'login'])->name('administracion.login');
    Route::get('/verification', [AuthController::class, 'showVerificationForm'])->name('verification.form');
    Route::get('/registro', [AdministradorController::class, 'registro'])->name('administracion.registro');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Comentarios
    Route::get('/comentarios', [ComentarioController::class, 'indexAdmin'])->name('admin.comentarios.index'); // Ver todos los comentarios
    Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('admin.comentarios.destroy'); // Eliminar un comentario
    
    
    
    // Rutas de roles
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.Roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('admin.Roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('admin.Roles.store');
    Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])->name('admin.Roles.edit');
    Route::post('/roles/update/{role}', [RoleController::class, 'update'])->name('admin.Roles.update');
    Route::delete('/roles/delete/{role}', [RoleController::class, 'destroy'])->name('admin.Roles.delete');
    Route::get('/usuarios/tipo_entrada', [TipoEntradaController::class, 'usuariosIndex'])->name('usuarios.tipo_entrada');

    Route::get('/layouts', function () {
        return view('layouts.admin_template');
    })->name('layouts.admin_template');

    //para guardaparques 
    //formulario para crear guardaparques
    Route::get('/guardaparque/crearGuardaParque',[GuardaparqueController::class,'create'])->name('admin.guardaparque.create');
    //para almacenar el guardaparques
    Route::post('/guardaparque/store',[GuardaparqueController::class,'store'])->name('admin.guardaparque.store');
    //para obtener todos los guardaparques
    Route::get('/guardaparques',[GuardaparqueController::class,'index'])->name('admin.guardaparque.index');
    //para eliminar un guardaparque
    Route::delete('guardaparque/delete/{guardaparque}',[GuardaparqueController::class,'destroy'])->name('admin.guardaparque.delete');
    //para editar el guardaparque
    Route::get('/guardaparque/edit/{guardaparque}',[GuardaparqueController::class,'edit'])->name('admin.guardaparque.edit');

    Route::patch('/guardaparque/update/{id}',[GuardaparqueController::class,'update'])->name('admin.guardaparque.update');

    //para eliminar un supervisa
    Route::delete('/guardaparque/supervisa/delete/{id}',[SupervisaController::class,'destroy']);
    //para eliminar un horario
    Route::delete('/guardaparque/horario/delete/{id}',[HorarioController::class,'destroy']);
    //para actualizar un horario
    Route::patch('/guardaparque/horario/update/{id}', [HorarioController::class, 'update'])->name('admin.guardaparque.horario.update');
    //para obtener un horario dado el id
    Route::get('/guardaparque/horario/get/{id}',[HorarioController::class,'get']);

    //para crear un supervisa
    Route::post('/guardaparque/supervisa/store',[SupervisaController::class,'store'])->name('admin.guardaparque.supervisa.create');

    //para eliminar el supervisa
    Route::delete('/guardaparque/supervisa/delete/{id}',[SupervisaController::class,'destroy']);

    Route::get('/guardarparque/bitacora/{id}',[BitacoraGuardaparqueController::class,'show'])->name('admin.guardaparque.bitacoraGuarda');
    //para crear un supervisa o asignacion de horario
  //  Route::put('/guardaparque/supervisa/edit',[Supervisa::class,'edit'])->name('admin.guardaparque.supervisa.update');
    //para actualizar un supervisa 
    //Route::get('/guardaparque/{guardaparque}/supervisa/crearAsignacion',[Supervisa::class,'create'])->name('admin.guardaparque.supervisa.create');


    
});
// Rutas de administración
Route::prefix('administradores')->group(function () {
    // Rutas para gestionar el perfil del administrador
    Route::get('/', [AdministradorController::class, 'index'])->name('admin.index'); // Ver perfil
    Route::get('/create', [AdministradorController::class, 'create'])->name('admin.create'); // Crear perfil
    Route::post('/store', [AdministradorController::class, 'store'])->name('admin.store'); // Guardar perfil
    Route::get('/edit/{id}', [AdministradorController::class, 'edit'])->name('admin.edit'); // Editar perfil
    Route::put('/update/{id}', [AdministradorController::class, 'update'])->name('admin.update'); // Actualizar perfil
    Route::post('/upload-image', [AdministradorController::class, 'uploadImage'])->name('admin.perfil.uploadImage'); // Subir imagen de perfil
    Route::delete('/delete-profile-image', [AdministradorController::class, 'deleteProfileImage'])->name('deleteProfileImage');



    Route::get('/tipo_entrada', [TipoEntradaController::class, 'index'])->name('admin.tipo_entrada.index');


    Route::get('/tipo_entrada/create', [TipoEntradaController::class, 'create'])->name('admin.tipo_entrada.create');
    Route::post('/tipo_entrada/store', [TipoEntradaController::class, 'store'])->name('admin.tipo_entrada.store');

    Route::get('/tipo_entrada/{tipo_entrada}/edit', [TipoEntradaController::class, 'edit'])->name('admin.tipo_entrada.edit');
    Route::put('/tipo_entrada/{tipo_entrada}', [TipoEntradaController::class, 'update'])->name('admin.tipo_entrada.update');
    Route::delete('/tipo_entrada/{tipo_entrada}', [TipoEntradaController::class, 'destroy'])->name('admin.tipo_entrada.destroy');

    Route::get('/comunidades', [ComunidadController::class, 'index'])->name('admin.comunidades.index'); // Ver perfil
    Route::post('/comunidades/store', [ComunidadController::class, 'store'])->name('admin.comunidades.store');
    Route::get('/comunidades/edit/{comunidad}', [ComunidadController::class, 'edit'])->name('admin.comunidades.edit');
    Route::put('/comunidades/update/{comunidad}', [ComunidadController::class, 'update'])->name('admin.comunidades.update');

    //r



    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

    // Route::delete('/destroy/{id}', [AdministradorController::class, 'destroy'])->name('admin.destroy'); // Eliminar perfil
    Route::put('/update-profile', [AdministradorController::class, 'updateProfile'])->name('updateProfile'); // Eliminar perfil
    // Otras rutas...
});


// Habilitar rutas de autenticación y verificación de correo
Auth::routes(['verify' => true]);

Route::middleware(['web'])->group(function () {
    // Rutas de autenticación
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
});

// Rutas de verificación
Route::get('/verificacion/{email}', [AuthController::class, 'showVerificationForm'])->name('verification.page');
Route::post('/verificar', [AuthController::class, 'verifyCode'])->name('verification.submit');
Route::get('/verification-success', function () {
    return view('emails.verification-success');
})->name('verification.success');

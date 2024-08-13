<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RandomUserController;


// Rutas para Estudiantes
Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::get('/estudiantes/{id}', [EstudianteController::class, 'show']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::put('/estudiantes/{id}', [EstudianteController::class, 'update']);
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy']);

// Rutas para Cursos
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/{id}', [CursoController::class, 'show']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::put('/cursos/{id}', [CursoController::class, 'update']);
Route::delete('/cursos/{id}', [CursoController::class, 'destroy']);

// Rutas para Materias
Route::get('/materias', [MateriaController::class, 'index']);
Route::get('/materias/{id}', [MateriaController::class, 'show']);
Route::post('/materias', [MateriaController::class, 'store']);
Route::put('/materias/{id}', [MateriaController::class, 'update']);
Route::delete('/materias/{id}', [MateriaController::class, 'destroy']);

// Rutas para Notas
Route::get('/notas', [NotaController::class, 'index']);
Route::get('/notas/{id}', [NotaController::class, 'show']);
Route::post('/notas', [NotaController::class, 'store']);
Route::put('/notas/{id}', [NotaController::class, 'update']);
Route::delete('/notas/{id}', [NotaController::class, 'destroy']);

//Ruta para ramdom
Route::get('/random-users', [RandomUserController::class, 'getUsers']);

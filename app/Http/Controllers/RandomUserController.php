<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\RandomUserService;

class RandomUserController extends Controller
{
    protected $randomUserService;

    public function __construct(RandomUserService $randomUserService)
    {
        $this->randomUserService = $randomUserService;
    }

    public function getUsers(): JsonResponse
    {
        // Obtener los datos procesados desde el servicio
        $data = $this->randomUserService->getUsersAndMostUsedLetter();

        // Retornar la respuesta en formato JSON
        return response()->json($data);
    }
}

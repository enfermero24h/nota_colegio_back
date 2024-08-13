<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Jobs\FetchRandomUsers;

class RandomUserAsincronaController extends Controller
{
    public function getUsers(Request $request): JsonResponse
    {
        // El callback URL es donde el Job enviará la respuesta
        $callbackUrl = route('random-users.callback');

        // Despachar el Job de forma asíncrona
        FetchRandomUsers::dispatch($callbackUrl);

        // Retornar una respuesta inmediata mientras el Job se procesa en segundo plano.
        return response()->json([
            'message' => 'La petición para obtener usuarios está siendo procesada.',
        ]);
    }

    public function callback(Request $request): JsonResponse
    {
        // Aquí recibimos la respuesta del Job una vez que se haya completado
        $data = $request->all();

        // Retornar los datos finales
        return response()->json($data);
    }
}

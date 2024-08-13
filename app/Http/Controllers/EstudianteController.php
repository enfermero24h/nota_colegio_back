<?php

namespace App\Http\Controllers;

use App\Services\EstudianteService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class EstudianteController extends Controller
{
    protected $estudianteService;

    public function __construct(EstudianteService $estudianteService)
    {
        $this->estudianteService = $estudianteService;
    }

    public function index(): JsonResponse
    {
        Log::debug('EstudianteController:index');
        $estudiantes = $this->estudianteService->getAll();
        return response()->json($estudiantes);
    }

    public function show(int $id): JsonResponse
    {
        $estudiante = $this->estudianteService->getById($id);
        if ($estudiante) {
            return response()->json($estudiante);
        }

        return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $estudiante = $this->estudianteService->create($request->all());
        return response()->json($estudiante, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $estudiante = $this->estudianteService->update($id, $request->all());

        if ($estudiante) {
            return response()->json($estudiante);
        }

        return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->estudianteService->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Estudiante eliminado']);
        }

        return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }
}

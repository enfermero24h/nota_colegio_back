<?php

namespace App\Http\Controllers;

use App\Services\MateriaService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MateriaController extends Controller
{
    protected $materiaService;

    public function __construct(MateriaService $materiaService)
    {
        $this->materiaService = $materiaService;
    }

    public function index(): JsonResponse
    {
        $materias = $this->materiaService->getAll();
        return response()->json($materias);
    }

    public function show(int $id): JsonResponse
    {
        $materia = $this->materiaService->getById($id);
        if ($materia) {
            return response()->json($materia);
        }

        return response()->json(['message' => 'Materia no encontrada'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $materia = $this->materiaService->create($request->all());
        return response()->json($materia, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $materia = $this->materiaService->update($id, $request->all());

        if ($materia) {
            return response()->json($materia);
        }

        return response()->json(['message' => 'Materia no encontrada'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->materiaService->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Materia eliminada']);
        }

        return response()->json(['message' => 'Materia no encontrada'], 404);
    }
    
}
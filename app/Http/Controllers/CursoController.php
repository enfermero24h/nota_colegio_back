<?php

namespace App\Http\Controllers;

use App\Services\CursoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CursoController extends Controller
{
    protected $cursoService;

    public function __construct(CursoService $cursoService)
    {
        $this->cursoService = $cursoService;
    }

    public function index(): JsonResponse
    {
        $cursos = $this->cursoService->getAll();
        return response()->json($cursos);
    }

    public function show(int $id): JsonResponse
    {
        $curso = $this->cursoService->getById($id);
        if ($curso) {
            return response()->json($curso);
        }

        return response()->json(['message' => 'Curso no encontrado'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $curso = $this->cursoService->create($request->all());
        return response()->json($curso, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $curso = $this->cursoService->update($id, $request->all());

        if ($curso) {
            return response()->json($curso);
        }

        return response()->json(['message' => 'Curso no encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->cursoService->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Curso eliminado']);
        }

        return response()->json(['message' => 'Curso no encontrado'], 404);
    }
}

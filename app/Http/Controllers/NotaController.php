<?php

namespace App\Http\Controllers;

use App\Services\NotaService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotaController extends Controller
{
    protected $notaService;

    public function __construct(NotaService $notaService)
    {
        $this->notaService = $notaService;
    }

    public function index(): JsonResponse
    {
        $notas = $this->notaService->getAll();
        return response()->json($notas);
    }

    public function show(int $id): JsonResponse
    {
        $nota = $this->notaService->getById($id);
        if ($nota) {
            return response()->json($nota);
        }

        return response()->json(['message' => 'Nota no encontrada'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $nota = $this->notaService->create($request->all());
        return response()->json($nota, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $nota = $this->notaService->update($id, $request->all());

        if ($nota) {
            return response()->json($nota);
        }

        return response()->json(['message' => 'Nota no encontrada'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->notaService->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Nota eliminada']);
        }

        return response()->json(['message' => 'Nota no encontrada'], 404);
    }
}

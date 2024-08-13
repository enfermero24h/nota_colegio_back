<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RandomUserService
{
    public function getUsersAndMostUsedLetter()
    {
        // Hacer la petición a la API de randomuser.me
        $response = Http::get('https://randomuser.me/api/', [
            'results' => 5, // Obtener 5 usuarios
        ]);

        $users = $response->json()['results'];

        // Concatenar los nombres completos
        $fullNames = array_map(function ($user) {
            return $user['name']['first'] . ' ' . $user['name']['last'];
        }, $users);

        // Contar las letras en todos los nombres completos
        $letterCount = [];

        foreach ($fullNames as $name) {
            $letters = str_split(strtolower($name));
            foreach ($letters as $letter) {
                if (ctype_alpha($letter)) { // Solo contar letras
                    if (!isset($letterCount[$letter])) {
                        $letterCount[$letter] = 0;
                    }
                    $letterCount[$letter]++;
                }
            }
        }

        // Obtener la letra más utilizada
        $mostUsedLetter = array_keys($letterCount, max($letterCount))[0];

        // Retornar usuarios y la letra más usada
        return [
            'users' => $users,
            'letra_mas_utilizada' => $mostUsedLetter, // Aquí cambiamos la clave a español
        ];
    }
}

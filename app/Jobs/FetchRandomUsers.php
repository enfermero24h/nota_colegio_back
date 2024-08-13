<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchRandomUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $callbackUrl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // 1. Obtener 5 personas desde la API randomuser.me
            $response = Http::get('https://randomuser.me/api/', [
                'results' => 5,
            ]);

            if ($response->failed()) {
                throw new \Exception("La solicitud a randomuser.me falló");
            }

            $users = $response->json()['results'];

            // 2. Calcular la letra más utilizada en los nombres completos
            $fullNames = array_map(function ($user) {
                return $user['name']['first'] . ' ' . $user['name']['last'];
            }, $users);

            // Contar las letras en todos los nombres completos
            $letterCount = [];

            foreach ($fullNames as $name) {
                $letters = str_split(strtolower($name));
                foreach ($letters as $letter) {
                    if (ctype_alpha($letter)) {
                        if (!isset($letterCount[$letter])) {
                            $letterCount[$letter] = 0;
                        }
                        $letterCount[$letter]++;
                    }
                }
            }

            // Obtener la letra más utilizada
            $mostUsedLetter = array_keys($letterCount, max($letterCount))[0];

            // 3. Enviar los datos al callback URL proporcionado
            Http::post($this->callbackUrl, [
                'users' => $users,
                'letra_mas_utilizada' => $mostUsedLetter,
            ]);
        } catch (\Exception $e) {
            // Registrar el error
            Log::error('FetchRandomUsers Job Error: ' . $e->getMessage());
            // Volver a lanzar la excepción para que Laravel maneje el retry si está configurado
            throw $e;
        }
    }
}

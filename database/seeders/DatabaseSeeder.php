<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Torneo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*   User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        /* $jugadores = [
            ['dni' => 27762551, 'nombre' => 'cesar', 'apellido' => 'mendez', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 33802598, 'nombre' => 'evangelina', 'apellido' => 'franco', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 29518180, 'nombre' => 'emanuel', 'apellido' => 'lopez pereyra', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 28212518, 'nombre' => 'diego raul', 'apellido' => 'solis', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 27762552, 'nombre' => 'jorge ramon', 'apellido' => 'alarcon', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 27762553, 'nombre' => 'sergio daniel', 'apellido' => 'maidana', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
            ['dni' => 27762554, 'nombre' => 'jorge enrique', 'apellido' => 'faria', 'nacimiento' => '1990-01-01', 'domicilio' => 'Calle Falsa 123'],
        ];

        foreach ($jugadores as $jugador) {
            Jugador::create($jugador);
        }


        $equipos = [
            ['nombre' => 'Libertad'],
            ['nombre' => 'At. lomas'],
            ['nombre' => 'Energy'],
            ['nombre' => 'B.Valenzuela'],
            ['nombre' => 'B. Norte'],
            ['nombre' => 'Gremio'],
            ['nombre' => 'Patronato'],
            ['nombre' => 'Santa Rosa'],
            ['nombre' => 'Los Reyes'],
            ['nombre' => '4 Soles'],
            ['nombre' => 'Los Pinos'],
            ['nombre' => 'Los Pinos A'],
            ['nombre' => 'Ex-Combatiente'],
            ['nombre' => 'Fenix'],
            ['nombre' => 'Dep. Unido'],
            ['nombre' => 'S.E.Comercio'],
            ['nombre' => 'Trans. Seltzer'],
            ['nombre' => 'Los Amigos de Hector'],
            ['nombre' => 'La Peste Roja'],
            ['nombre' => 'Doña Mary'],
            ['nombre' => 'Vet. Arandu'],
            ['nombre' => 'G & M'],

        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
 */

        $torneos = [
            ['nombre' => 'Eugenio Tatarinoff', 'year' => '2023', 'categoria' => 35, 'cantidad_fechas' => 29],
            ['nombre' => 'Jorge Valenzuela', 'year' => '2024', 'categoria' => 35, 'cantidad_fechas' => 29],
        ];

        foreach ($torneos as $torneo) {
            Torneo::create($torneo);
        }
    }
}

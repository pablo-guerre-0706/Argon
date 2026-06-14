<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControlPanaderiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   // Datos de las tablas maestras que ==> raw_materials
        // units_measures (Unidades de medida)
        DB::table('units_measures')->insertOrIgnore([
            ['name' => 'Kilogramo', 'type' => 'Peso', 'abbreviation' => 'kg'],
            ['name' => 'Libra', 'type' => 'Peso', 'abbreviation' => 'lb'],
            ['name' => 'Onza', 'type' => 'Peso', 'abbreviation' => 'on'],
            ['name' => 'Quintal', 'type' => 'Peso', 'abbreviation' => 'qq'],
            ['name' => 'Litro', 'type' => 'Volumen', 'abbreviation' => 'lt'],
            ['name' => 'Galon', 'type' => 'Volumen', 'abbreviation' => 'gl'],
            ['name' => 'Cuchara', 'type' => 'Cocina', 'abbreviation' => 'cda'],
            ['name' => 'pizca', 'type' => 'Cocina', 'abbreviation' => 'pz']
        ]);

        // categories_mat (Categoría de materias prima)
        DB::table('categories_mat')->insertOrIgnore([
            ['name' => 'Nacional', 'description' => 'Materia prima de origen local'],
            ['name' => 'Importada', 'description' => 'Materia prima de origen internacional'],
            ['name' => 'Entera', 'description' => 'Solidos o granos enteros'],
            ['name' => 'En polvo', 'description' => 'Pulverizados o harinas'],
            ['name' => 'Frescas/Prensada', 'description' => 'Bloques o cubos refrigerados'],
            ['name' => 'Secos activos', 'description' => 'granulos oscuros en sobre o frascos hermeticos'],
            ['name' => 'Masa', 'description' => 'Silvestres o bacterias a base de harina y agua']
        ]);

        // brands (Marcas de materias primas)
        DB::table('brands')->insertOrIgnore([
            ['name' => 'King Artur Baking', 'description' => 'Harina de trigo de fuerza', 'origin' => 'EEUU'],
            ['name' => 'Caputo', 'description' => 'Molida para proteger almidones, panes, pizzas', 'origin' => 'Italia'],
            ['name' => 'Tradicional Zamora', 'description' => 'Molida en piedra, conserva germen del trigo', 'origin' => 'Espana'],
            ['name' => 'Saf-Instant', 'description' => 'Seca, no hidratacion previa, masas dulces', 'origin' => 'Francia'],
            ['name' => 'Nevada', 'description' => 'Seca, gran poder fermentativo', 'origin' => 'EE.UU'],
            ['name' => 'Ibis', 'description' => 'Mejoradores y acondicionadores de masa', 'origin' => 'Francia'],
            ['name' => 'Maseca', 'description' => 'Seca, elemento acompañador de volumen', 'origin' => 'Nacional'],
            ['name' => 'La Unica', 'description' => 'Grasa vegetal, imita a la mantequilla trad.', 'origin' => 'Guatemala'],
            ['name' => 'Anchor', 'description' => 'Alta calidad microbiologica', 'origin' => 'Nueva Zelanda'],
            ['name' => 'LTSA', 'description' => 'frutas texturizadas', 'origin' => 'Costa Rica']
        ]);

        DB::table('raw_materials')->insertOrIgnore([
            ['name' => 'Harina de reposteria'],
            ['name' => 'Harina de trigo'],
            ['name' => 'Levadura fresca'],
            ['name' => 'Levadura seca'],
            ['name' => 'Royal'],
            ['name' => 'Bicarbonato de sodio'],
            ['name' => 'Maicena'],
            ['name' => 'Cremor tartaro'],
            ['name' => 'Azucar blanca'],
            ['name' => 'Azucar glass'],
            ['name' => 'Miel de abeja'],
            ['name' => 'Miel de maiz'],
            ['name' => 'Leche entera liquida'],
            ['name' => 'Leche entera en polvo'],
            ['name' => 'Chantilly'],
            ['name' => 'Mantequilla'],
            ['name' => 'Margarina'],
            ['name' => 'Huevo'],
            ['name' => 'Agua'],
            ['name' => 'Aceite vegetal'],
            ['name' => 'Relleno de chocolate'],
            ['name' => 'Relleno de tres leches'],
            ['name' => 'Crema pastelera'],
            ['name' =>'Almibar'],
            ['name' =>'Esencia de vainilla'],
            ['name' => 'Extracto de limon'],
            ['name' => 'Mejorante de masa'],
            ['name' => 'Emulsiones'],
            ['name' => 'Conservante']
        ]);
    }
}


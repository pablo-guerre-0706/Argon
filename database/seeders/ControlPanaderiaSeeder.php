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
        // suppliers (Proveedores)
        DB::table('suppliers')->insertOrIgnore([
            [
                'name' => 'Molinos de Nicaragua S.A.', 
                'status' => 'active', 
                'phone' => '+505 2233-4455', 
                'email' => 'ventas@molinosnic.com', 
                'address' => 'Km 4.5 Carretera Norte, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Distribuidora La Levadura Oro', 
                'status' => 'active', 
                'phone' => '+505 8888-1122', 
                'email' => 'pedidos@levaduraoro.com', 
                'address' => 'De los semáforos de la cancillería 2 cuadras al lago, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lácteos El Cortijo', 
                'status' => 'active', 
                'phone' => '+505 2277-9900', 
                'email' => 'contacto@elcortijo.com', 
                'address' => 'Frente a la delegación policial del Distrito 5, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'PATRY', 
                'status' => 'active', 
                'phone' => '+505 8220-1010', 
                'email' => 'comercializacion@patry.com', 
                'address' => 'De donde fue COMMEMA 1 cuadra al este, Módulo C-111, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SprinKles', 
                'status' => 'active', 
                'phone' => '+505 8545-1620', 
                'email' => 'sprinklesnic@gmail.com', 
                'address' => 'Semáforos de Rubenia 2 cuadras abajo, frente a SINSA, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Distribuidora Industrial', 
                'status' => 'active', 
                'phone' => '+505 8433-3000',
                'email' => 'diinsa@gmail.com', 
                'address' => 'Mercado Oriental, de la iglesia El Calvario 5 cuadras abajo, Managua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Distribuidora El Quesito', 
                'status' => 'active', 
                'phone' => '+505 8539-4006', 
                'email' => 'elquesitoesteli@gmail.com', 
                'address' => 'Frente al Pali, calle central, Estelí',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Insumos Sébaco', 
                'status' => 'active', 
                'phone' => '+505 8679-6949', 
                'email' => 'insumossebaco@gmail.com', 
                'address' => 'Frente a la Comunidad Indigena, salida a Matagalpa, Sébaco',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Distribuidora Quimica Nicaragua', 
                'status' => 'active', 
                'phone' => '+505 8614-2210', 
                'email' => 'disquin@gmail.com', 
                'address' => 'Frente al Hospital San Juan de Dios, Estelí',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Distribuidora Esteliana', 
                'status' => 'active', 
                'phone' => '+505 812-1992',
                'email' => 'Disesteliana@gmail.com', 
                'address' => 'Frente a Shell Esquipulas, Estelí',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // categories_mat (Categorías)
        DB::table('categories_mat')->insertOrIgnore([
            ['name' => 'Nacional', 'description' => 'Materia prima de origen local'],
            ['name' => 'Importada', 'description' => 'origen internacional'],
            ['name' => 'Entera', 'description' => 'Solidos o granos enteros'],
            ['name' => 'Fresca', 'description' => 'Ingrediente primario, alta calidad'],
            ['name' => 'En polvo', 'description' => 'Pulverizados o harinas'],
            ['name' => 'Frescas/Prensada', 'description' => 'Bloques o cubos refrigerados'],
            ['name' => 'Secos activos', 'description' => 'granulos oscuros en sobre o frascos hermeticos'],
            ['name' => 'Masa', 'description' => 'Silvestres o bacterias a base de harina y agua']
        ]);

        // brands (Marcas)
        DB::table('brands')->insertOrIgnore([
            ['name' => 'King Artur Baking', 'description' => 'Trigo de fuerza y otros elementos', 'origin' => 'EEUU'],
            ['name' => 'Caputo', 'description' => 'Molida para proteger almidones, panes, pizzas', 'origin' => 'Italia'],
            ['name' => 'Tradicional Zamora', 'description' => 'Molida en piedra, conserva germen del trigo', 'origin' => 'Espana'],
            ['name' => 'Saf-Instant', 'description' => 'Seca, alta calidad, masas dulces', 'origin' => 'Francia'],
            ['name' => 'Jalisk', 'description' => 'Fresca, alta calidad', 'origin' => 'México'],
            ['name' => 'Pueblina', 'description' => 'Seca, gran poder fermentativo', 'origin' => 'México'],
            ['name' => 'Ibis', 'description' => 'Mejoradores y acondicionadores de masa', 'origin' => 'Francia'],
            ['name' => 'Maseca', 'description' => 'Seca, elemento acompañador de volumen', 'origin' => 'Nacional'],
            ['name' => 'La Unica', 'description' => 'Grasa vegetal y otros elementos naturales', 'origin' => 'Guatemala'],
            ['name' => 'Anchor', 'description' => 'Alta calidad microbiológica', 'origin' => 'Nueva Zelanda'],
            ['name' => 'LTSA', 'description' => 'frutas texturizadas', 'origin' => 'Costa Rica'],
            ['name' => 'Chontaleña', 'description' => 'Masa, alta calidad microbiológica', 'origin' => 'Nicaragua'],
            ['name' => 'Tio Pelón', 'description' => 'Entera, conserva germen del trigo', 'origin' => 'Nicaragua'],
            ['name' => 'El Norteño', 'description' => 'Componentes naturales', 'origin' => 'Nicaragua'],
            ['name' => 'El Nica', 'description' => 'Lacteos, primera calidad', 'origin' => 'Nicaragua']
        ]);

        // units_measures (Unidades de medida)
        DB::table('units_measures')->insertOrIgnore([
            ['name' => 'Kilogramo', 'type' => 'Peso', 'abbreviation' => 'kg'],
            ['name' => 'Gramo', 'type' => 'Peso', 'abbreviation' => 'g'],
            ['name' => 'Libra', 'type' => 'Peso', 'abbreviation' => 'lb'],
            ['name' => 'Onza', 'type' => 'Peso', 'abbreviation' => 'on'],
            ['name' => 'Arroba', 'type' => 'Peso', 'abbreviation' => 'Ar'],
            ['name' => 'Quintal', 'type' => 'Peso', 'abbreviation' => 'qq'],
            ['name' => 'Litro', 'type' => 'Volumen', 'abbreviation' => 'lt'],
            ['name' => 'Galon', 'type' => 'Volumen', 'abbreviation' => 'gl'],
            ['name' => 'Cuchara', 'type' => 'Cocina', 'abbreviation' => 'cda'],
            ['name' => 'pizca', 'type' => 'Cocina', 'abbreviation' => 'pz'],
            ['name' => 'Unidad', 'type' => 'Cantidad', 'abbreviation' => 'ud'],
            ['name' => 'Decena', 'type' => 'Cantidad', 'abbreviation' => 'd'],
            ['name' => 'Centenar', 'type' => 'Cantidad', 'abbreviation' => 'c'],
            ['name' => 'Cajilla', 'type' => 'Cantidad', 'Abbreviation' => 'cj'],
            ['name' => 'Lata stardar', 'type' => 'Peso', 'Abbreviation' => 'lta']
        ]);

        // raw_materials (Nombres de materia prima)
        DB::table('raw_materials')->insert([
            [
                'name' => 'Harina de repostería',
                'bar_code' => '27002',
                'purchase_price' => '42.50',
                'weight' => '1.000',
                'category_mat_id' => 2,
               'brand_id' => 1,
                'unit_measure_id' => 1,
            ],
            [
                'name' => 'Harina de trigo 1',
                'bar_code' => '27003',
                'purchase_price' => '38.25',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 2,
                'unit_measure_id' => 1,
            ],
            [
                'name' => 'Harina de trigo 2',
                'bar_code' => '27004',
                'purchase_price' => '38.25',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 3,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Levadura fresca',
                'bar_code' => '27005',
                'purchase_price' => '18.90',
                'weight' => '1.000',
                'category_mat_id' => 4,
                'brand_id' => 5,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Levadura seca',
                'bar_code' => '27006',
                'purchase_price' => '54.50',
                'weight' => '1.000',
                'category_mat_id' => 5,
                'brand_id' => 6,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Royal', 
                'bar_code' => '27007',
                'purchase_price' => '22.15',
                'weight' => '1.000',
                'category_mat_id' => 5,
                'brand_id' => 7,
                'unit_measure_id' => 2,
            ],
            [
                'name' => 'Bicarbonato de sodio',
                'bar_code' => '27008',
                'purchase_price' => '14.80',
                'weight' => '1.000',
                'category_mat_id' => 5,
                'brand_id' => 7,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Maicena',
                'bar_code' => '27009',
                'purchase_price' => '29.35',
                'weight' => '1.000',
                'category_mat_id' => 5,
                'brand_id' => 11,
                'unit_measure_id' => 1,
            ],
            [
                'name' => 'Cremor tartaro',
                'bar_code' => '27010',
                'purchase_price' => '88.60',
                'weight' => '1.000',
                'category_mat_id' => 8,
                'brand_id' => 8,
                'unit_measure_id' => 2,
            ],
            [
                'name' => 'Azúcar blanca', 
                'bar_code' => '27011',
                'purchase_price' => '24.10',
                'weigth' =>'1.000',
                'category_mat_id' => 5,
                'brand_id' => 12,
                'unit_measure_id' => 6,
            ],
            [
                'name' => 'Azúcar glass',
                'bar_code' => '27012',
                'purchase_price' => '36.75',
                'weight' => '1.000',
                'category_mat_id' => 5,
                'brand_id' => 2,
                'unit_measure_id' => 1,
            ],
            [
                'name' => 'Miel de abeja',
                'bar_code' => '27013',
                'purchase_price' => '135.00',
                'weight' => '1.000',
                'category_mat_id' => 4,
                'brand_id' => 14,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Miel de maiz',
                'bar_code' => '27014',
                'purchase_price' => '95.20',
                'weight' => '1.000',
                'category_mat_id' => 4,
                'brand_id' => 13,
                'unit_measure_id' => 3,
            ],
            [
               'name' => 'Leche entera líquida',
                'bar_code' => '27015',
                'purchase_price' => '31.50',
                'weight' => '1.000',
                'category_mat_id' => 4,
                'brand_id' => 15,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Leche entera en polvo',
                'bar_code' => '27016',
                'purchase_price' => '115.80', 
                'weight' => '1.000',
                'category_mat_id' => 3,
                'brand_id' => 10,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Chantilly', 
                'bar_code' => '27017',
                'purchase_price' => '12.00',
                'weight' => '1.000',
                'category_mat_id' => 8,
                'brand_id' => 7,
                'unit_measure_id' => 7,
            ],
            [
                'name' => 'Mantequilla',
                'bar_code' => '27018',
                'purchase_price' => '68.30',
                'weight' => '1.000',
                'category_mat_id' => 8,
                'brand_id' => 15,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Margarina',
                'bar_code' => '27019',
                'purchase_price' => '44.15',
                'weight' => '1.000',
                'category_mat_id' => 6,
                'brand_id' => 7,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Huevo',
                'bar_code' => '27020',
                'purchase_price' => '65.00',
                'weight' => '10.000',
                'category_mat_id' => 1,
                'brand_id' => 14,
                'unit_measure_id' => 14,
            ],
            [
                'name' => 'Agua purificada',
                'bar_code' => '27021',
                'purchase_price' => '2.00',
                'weight' => '1.000',
                'category_mat_id' => 1,
                'brand_id' => 15,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Aceite vegetal',
                'bar_code' => '27022',
                'purchase_price' => '58.90',
                'weight' => '1.000',
                'category_mat_id' => 1,
                'brand_id' => 7,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Relleno de chocolate',
                'bar_code' => '27023',
                'purchase_price' => '138.00',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 12,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Relleno de tres leches',
                'bar_code' => '27024',
                'purchase_price' => '112.50',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 6,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Crema pastelera',
                'bar_code' => '27025',
                'purchase_price' => '79.40',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 6,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Almibar',
                'bar_code' => '27026',
                'purchase_price' => '33.60',
                'weight' => '1.000',
                'category_mat_id' => 1,
                'brand_id' => 14,
                'unit_measure_id' => 1,
            ],
            [
                'name' => 'Esencia de vainilla', 
                'bar_code' => '27027', 
                'purchase_price' => '48.20',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 7,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Extracto de limón',
                'bar_code' => '27028',
                'purchase_price' => '52.10',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 14,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Mejorante de masa',
                'bar_code' => '27029',
                'purchase_price' => '61.30',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 8,
                'unit_measure_id' => 3,
            ],
            [
                'name' => 'Emulsiones',
                'bar_code' => '27030',
                'purchase_price' => '74.50',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 9,
                'unit_measure_id' => 8,
            ],
            [
                'name' => 'Conservante',
                'bar_code' => '27031',
                'purchase_price' => '49.90',
                'weight' => '1.000',
                'category_mat_id' => 2,
                'brand_id' => 9,
                'unit_measure_id' => 3,
            ],
        ]);
    }
}

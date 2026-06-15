<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\DescriptionList\Node\Description;

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

        // units_measures (Unidades de medida)
        DB::table('units_measures')->insertOrIgnore([
            ['name' => 'Kilogramo', 'type' => 'Peso', 'abbreviation' => 'kg'],
            ['name' => 'Gramo', 'type' => 'Peso', 'abbreviation' => 'g'],
            ['name' => 'Libra', 'type' => 'Peso', 'abbreviation' => 'lb'],
            ['name' => 'Onza', 'type' => 'Peso', 'abbreviation' => 'on'],
            ['name' => 'Quintal', 'type' => 'Peso', 'abbreviation' => 'qq'],
            ['name' => 'Litro', 'type' => 'Volumen', 'abbreviation' => 'lt'],
            ['name' => 'Galon', 'type' => 'Volumen', 'abbreviation' => 'gl'],
            ['name' => 'Cuchara', 'type' => 'Cocina', 'abbreviation' => 'cda'],
            ['name' => 'pizca', 'type' => 'Cocina', 'abbreviation' => 'pz'],
            ['name' => 'Unidad', 'type' => 'Cantidad', 'abbreviation' => 'u'],
            ['name' => 'Decena', 'type' => 'Cantidad', 'abbreviation' => 'd'],
            ['name' => 'Centenar', 'type' => 'cantidad', 'abbreviation' => 'c']
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
            ['name' => 'King Artur Baking', 'description' => 'Trigo de fuerza', 'origin' => 'EEUU'],
            ['name' => 'Caputo', 'description' => 'Molida para proteger almidones, panes, pizzas', 'origin' => 'Italia'],
            ['name' => 'Tradicional Zamora', 'description' => 'Molida en piedra, conserva germen del trigo', 'origin' => 'Espana'],
            ['name' => 'Saf-Instant', 'description' => 'Seca, no hidratacion previa, masas dulces', 'origin' => 'Francia'],
            ['name' => 'Nevada', 'description' => 'Seca, gran poder fermentativo', 'origin' => 'EE.UU'],
            ['name' => 'Ibis', 'description' => 'Mejoradores y acondicionadores de masa', 'origin' => 'Francia'],
            ['name' => 'Maseca', 'description' => 'Seca, elemento acompañador de volumen', 'origin' => 'Nacional'],
            ['name' => 'La Unica', 'description' => 'Grasa vegetal, imita a la mantequilla trad.', 'origin' => 'Guatemala'],
            ['name' => 'Anchor', 'description' => 'Alta calidad microbiológica', 'origin' => 'Nueva Zelanda'],
            ['name' => 'LTSA', 'description' => 'frutas texturizadas', 'origin' => 'Costa Rica'],
            ['name' => 'Chontaleña', 'description' => 'Masa, alta calidad microbiológica', 'origin' => 'Nicaragua'],
            ['name' => 'Tio Pelón', 'description' => 'Entera, conserva germen del trigo', 'origin' => 'Nicaragua'],
            ['name' => 'El Norteño', 'description' => 'Natural, de amor', 'origin' => 'Nicaragua'],
            ['name' => 'El Norteño', 'description' => 'Granja, primera calidad', 'origin' => 'Nicaragua']
        ]);

        // raw_materials (Nombres de materia prima)
        DB::table('raw_materials')->insertOrIgnore([
            ['name' => 'Harina de repostería', 'bar_code' => '27003', 'purchase_price' => '42.50', 'weight' => '1.000'],
            ['name' => 'Harina de trigo', 'bar_code' => '27004', 'purchase_price' => '38.50', 'weight' => '1.000'],
            ['name' => 'Levadura fresca', 'bar_code' => '27005'],
            ['name' => 'Levadura seca', 'bar_code' => '27006'],
            ['name' => 'Royal', 'bar_code' => '27007'],
            ['name' => 'Bicarbonato de sodio', 'bar_code' => '27008'],
            ['name' => 'Maicena', 'bar_code' => '27009'],
            ['name' => 'Cremor tartaro', 'bar_code' => '27010'],
            ['name' => 'Azúcar blanca', 'bar_code' => '27011'],
            ['name' => 'Azúcar glass', 'bar_code' => '27012'],
            ['name' => 'Miel de abeja', 'bar_code' => '27013'],
            ['name' => 'Miel de maiz', 'bar_code' => '27014'],
            ['name' => 'Leche entera líquida', 'bar_code' => '27015'],
            ['name' => 'Leche entera en polvo', 'bar_code' => '27016'],
            ['name' => 'Chantilly', 'bar_code' => '27017'],
            ['name' => 'Mantequilla', 'bar_code' => '27018'],
            ['name' => 'Margarina', 'bar_code' => '27019'],
            ['name' => 'Huevo', 'bar_code' => '27020'],
            ['name' => 'Agua', 'bar_code' => '27021'],
            ['name' => 'Aceite vegetal', 'bar_code' => '27022'],
            ['name' => 'Relleno de chocolate', 'bar_code' => '27023'],
            ['name' => 'Relleno de tres leches', 'bar_code' => '27024'],
            ['name' => 'Crema pastelera', 'bar_code' => '27025'],
            ['name' =>'Almibar', 'bar_code' => '27026'],
            ['name' =>'Esencia de vainilla', 'bar_code' => '27027'],
            ['name' => 'Extracto de limón', 'bar_code' => '27028'],
            ['name' => 'Mejorante de masa', 'bar_code' => '27029'],
            ['name' => 'Emulsiones', 'bar_code' => '27030'],
            ['name' => 'Conservante', 'bar_code' => '27031']
        ]);
    }
}

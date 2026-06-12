<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $p1 = Permission::firstOrCreate(['name' => 'crear_orden_compra']);
        $p2 = Permission::firstOrCreate(['name' => 'registrar_entrada_materia_prima']);
        $p3 = Permission::firstOrCreate(['name' => 'crear_orden_produccion']);
        $p4 = Permission::firstOrCreate(['name' => 'registrar_salida_a_produccion']);
        $p5 = Permission::firstOrCreate(['name' => 'registrar_producto_terminado']);
        $p6 = Permission::firstOrCreate(['name' => 'registrar_venta']);

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
        $panadero = Role::firstOrCreate(['name' => 'panadero']);
        $panadero->givePermissionTo([
            'crear_orden_produccion',
            'registrar_salida_a_produccion',
            'registrar_producto_terminado'
        ]);
        $cajero = Role::firstOrCreate(['name' => 'cajero']);
        $cajero->givePermissionTo([
            'crear_orden_compra',
            'registrar_entrada_materia_prima',
            'registrar_venta'
        ]);

        //Donald Illescas - encargado principal
        $donaldUser = User::firstOrCreate(
            ['email' => 'donald.illescas@example.com'],
            [
                'name' => 'Donald Illescas',
                'password' => Hash::make('secret123')
            ]
        );
        $donaldUser->assignRole('admin');

        $limberUser = User::find(2);
        if ($limberUser) {
            $limberUser->assignRole('admin');
        }

        $pabloUser = User::find(4);
        if ($pabloUser) {
            $pabloUser->assignRole('admin');
        }
    }
}

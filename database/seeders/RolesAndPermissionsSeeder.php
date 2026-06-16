<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Commands\AssignRole;

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
        $p5 = Permission::firstOrCreate(['name' => 'notificar_produccion_terminada']);
        $p6 = Permission::firstOrCreate(['name' => 'registrar_producto_terminado']);
        $p7 = Permission::firstOrCreate(['name' => 'registrar_salida_a_venta']);
        $p8 = Permission::firstOrCreate(['name' => 'registrar_venta']);

        //Roles y permisos
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $admin->givePermissionTo(Permission::all());

        $resp_compras = Role::firstOrCreate(['name' => 'Responsable de compras']);
        $resp_compras->givePermissionTo([1]);
        
        $resp_produccion = Role::firstOrCreate(['name' => 'Responsable de produccion']);
        $resp_produccion->givePermissionTo([$p3, $p5]);

        $bodeguero = Role::firstOrCreate(['name' => 'Responsable de bodega']);
        $bodeguero->givePermissionTo([$p2, $p4, $p6, $p7]);

        $cajero = Role::firstOrCreate(['name' => 'Cajero']);
        $cajero->givePermissionTo([$p8]);


        //Accesos y usuarios
        //Donald Illescas - Encargado principal
        $donaldUser = User::firstOrCreate(
            ['email' => 'donald.illescas@example.com'],
            [    'name' => 'Donald Illescas',
                'password' => Hash::make('panaderia123')
            ]
        );
        $donaldUser->assignRole($admin);

        $juanUser = User::firstOrCreate(
            ['email' => 'juan@example.com'],
            [
                'name' => 'Juan Comp',
                'password' => Hash::make('panaderia123')
            ]
        );
        $juanUser->assignRole($resp_compras);

        $miguelUser = User::firstOrCreate(
            ['email' => 'miguel@example.com'],
            [    'name' => 'Miguel Prod',
                'password' => Hash::make('panaderia123')
            ]
        );
        $miguelUser->assignRole($resp_produccion);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un rol y permiso de ejemplo
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit articles']);

        // Crear un usuario administrador
        $user = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'), // Asegúrate de cambiar esta contraseña
        ]);

        // Asignar el rol y permiso al usuario
        $user->assignRole($role);
        $user->givePermissionTo($permission);
    }
}
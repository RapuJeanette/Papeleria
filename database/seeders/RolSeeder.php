<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1= Role::create(['name'=>'Admin']);
       $role2= Role::create(['name'=>'Cliente']);

       $permission = Permission::create(['name' => 'dashboard'])->syncRoles($role1,$role2);
       $permission = Permission::create(['name' => 'usuario.index'])->syncRoles($role1,$role2);
       $permission = Permission::create(['name' => 'usuario.crear'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'usuario.guardar'])->syncRoles($role1);

       $permission = Permission::create(['name' => 'producto.index'])->syncRoles($role1,$role2);
       $permission = Permission::create(['name' => 'producto.crear'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'producto.guardar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'producto.editar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'producto.actualizar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'producto.eliminar'])->syncRoles($role1);

       $permission = Permission::create(['name' => 'categoria.index'])->syncRoles($role1,$role2);
       $permission = Permission::create(['name' => 'categoria.crear'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'categoria.guardar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'categoria.editar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'categoria.actualizar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'categoria.eliminar'])->syncRoles($role1);

       $permission = Permission::create(['name' => 'cliente.index'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'cliente.crear'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'cliente.guardar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'cliente.editar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'cliente.actualizar'])->syncRoles($role1);
       $permission = Permission::create(['name' => 'cliente.eliminar'])->syncRoles($role1);

    }
}

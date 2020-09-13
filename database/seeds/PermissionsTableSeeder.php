<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
            //Roles
                Permission::create(['name' => 'roles.index']);
                Permission::create(['name' => 'roles.edit']);
                Permission::create(['name' => 'roles.show']);
                Permission::create(['name' => 'roles.create']);
                Permission::create(['name' => 'roles.destroy']);

            //Usuarios
                Permission::create(['name' => 'users.index']);
                Permission::create(['name' => 'users.edit']);
                Permission::create(['name' => 'users.show']);
                Permission::create(['name' => 'users.create']);
                Permission::create(['name' => 'users.destroy']);

            //Clientes
                Permission::create(['name' => 'clientes.index']);
                Permission::create(['name' => 'clientes.edit']);
                Permission::create(['name' => 'clientes.show']);
                Permission::create(['name' => 'clientes.create']);
                Permission::create(['name' => 'clientes.destroy']);

            //Solicitudes
                Permission::create(['name' => 'solicitudes.index']);
                Permission::create(['name' => 'solicitudes.edit']);
                Permission::create(['name' => 'solicitudes.revision']);
                Permission::create(['name' => 'solicitudes.show']);
                Permission::create(['name' => 'solicitudes.create']);
                Permission::create(['name' => 'solicitudes.destroy']);

            //Tareas
                Permission::create(['name' => 'tareas.index']);
                Permission::create(['name' => 'tareas.edit']);
                Permission::create(['name' => 'tareas.revision']);
                Permission::create(['name' => 'tareas.show']);
                Permission::create(['name' => 'tareas.create']);
                Permission::create(['name' => 'tareas.destroy']);

            //Maquinarias
                Permission::create(['name' => 'maquinarias.index']);
                Permission::create(['name' => 'maquinarias.edit']);
                Permission::create(['name' => 'maquinarias.show']);
                Permission::create(['name' => 'maquinarias.create']);
                Permission::create(['name' => 'maquinarias.destroy']);

            //Operarios
                Permission::create(['name' => 'operarios.index']);
                Permission::create(['name' => 'operarios.edit']);
                Permission::create(['name' => 'operarios.show']);
                Permission::create(['name' => 'operarios.create']);
                Permission::create(['name' => 'operarios.destroy']);

            //Mantenimientos
                Permission::create(['name' => 'mantenimientos.index']);
                Permission::create(['name' => 'mantenimientos.edit']);
                Permission::create(['name' => 'mantenimientos.revision']);
                Permission::create(['name' => 'mantenimientos.show']);
                Permission::create(['name' => 'mantenimientos.create']);
                Permission::create(['name' => 'mantenimientos.destroy']);

            //Trabajos
                Permission::create(['name' => 'trabajos.index']);
                Permission::create(['name' => 'trabajos.edit']);
                Permission::create(['name' => 'trabajos.revision']);
                Permission::create(['name' => 'trabajos.show']);
                Permission::create(['name' => 'trabajos.create']);
                Permission::create(['name' => 'trabajos.destroy']);

            //Marcas
                Permission::create(['name' => 'marcas.index']);
                Permission::create(['name' => 'marcas.edit']);
                Permission::create(['name' => 'marcas.show']);
                Permission::create(['name' => 'marcas.create']);
                Permission::create(['name' => 'marcas.destroy']);

            //Otros
                Permission::create(['name' => 'actividades']);
                Permission::create(['name' => 'actividades.encargos']);
                Permission::create(['name' => 'actividades.encargos.general']);
                Permission::create(['name' => 'actividades.encargos.general.solicitudes']);
                Permission::create(['name' => 'actividades.encargos.general.tareas']);
                Permission::create(['name' => 'actividades.encargos.asignaciones']);
                Permission::create(['name' => 'actividades.mantenimientos']);
                Permission::create(['name' => 'actividades.mantenimientos.general']);
                Permission::create(['name' => 'actividades.mantenimientos.general.mantenimientos']);
                Permission::create(['name' => 'actividades.mantenimientos.general.trabajos']);
                Permission::create(['name' => 'admin']);
                Permission::create(['name' => 'admin.personas']);
                Permission::create(['name' => 'admin.personas.administrativo']);
                Permission::create(['name' => 'admin.personas.administrativo.funcionarios']);
                Permission::create(['name' => 'admin.personas.administrativo.operarios']);
                Permission::create(['name' => 'admin.personas.general']);
                Permission::create(['name' => 'admin.personas.general.clientes']);
                Permission::create(['name' => 'admin.vehiculos']);
                Permission::create(['name' => 'admin.vehiculos.administrativo']);
                Permission::create(['name' => 'admin.vehiculos.administrativo.maquinarias']);
                Permission::create(['name' => 'admin.vehiculos.general']);
                Permission::create(['name' => 'admin.vehiculos.general.marcas']);

        //Acceso total
            $admin = Role::create(['name' => 'Acceso Total']);

            $admin->givePermissionTo([
                //Roles
                    'roles.index',
                    'roles.edit',
                    'roles.show',
                    'roles.create',
                    'roles.destroy',
                //Usuarios
                    'users.index',
                    'users.edit',
                    'users.show',
                    'users.create',
                    'users.destroy',
                //Clientes
                    'clientes.index',
                    'clientes.edit',
                    'clientes.show',
                    'clientes.create',
                    'clientes.destroy',
                //Solicitudes
                    'solicitudes.index',
                    'solicitudes.edit',
                    'solicitudes.show',
                    'solicitudes.create',
                    'solicitudes.destroy',
                    'solicitudes.revision',
                //Tareas
                    'tareas.index',
                    'tareas.edit',
                    'tareas.show',
                    'tareas.create',
                    'tareas.destroy',
                    'tareas.revision',
                //Maquinarias
                    'maquinarias.index',
                    'maquinarias.edit',
                    'maquinarias.show',
                    'maquinarias.create',
                    'maquinarias.destroy',
                //Operarios
                    'operarios.index',
                    'operarios.edit',
                    'operarios.show',
                    'operarios.create',
                    'operarios.destroy',
                //Mantenimientos
                    'mantenimientos.index',
                    'mantenimientos.edit',
                    'mantenimientos.revision',
                    'mantenimientos.show',
                    'mantenimientos.create',
                    'mantenimientos.destroy',
                //Trabajos
                    'trabajos.index',
                    'trabajos.edit',
                    'trabajos.revision',
                    'trabajos.show',
                    'trabajos.create',
                    'trabajos.destroy',
                //Marcas
                    'marcas.index',
                    'marcas.edit',
                    'marcas.show',
                    'marcas.create',
                    'marcas.destroy',
                //Otros
                    'actividades',
                    'actividades.encargos',
                    'actividades.encargos.general',
                    'actividades.encargos.general.solicitudes',
                    'actividades.encargos.general.tareas',
                    'actividades.encargos.asignaciones',
                    'actividades.mantenimientos',
                    'actividades.mantenimientos.general',
                    'actividades.mantenimientos.general.mantenimientos',
                    'actividades.mantenimientos.general.trabajos',
                    'admin',
                    'admin.personas',
                    'admin.personas.administrativo',
                    'admin.personas.administrativo.funcionarios',
                    'admin.personas.administrativo.operarios',
                    'admin.personas.general',
                    'admin.personas.general.clientes',
                    'admin.vehiculos',
                    'admin.vehiculos.administrativo',
                    'admin.vehiculos.administrativo.maquinarias',
                    'admin.vehiculos.general',
                    'admin.vehiculos.general.marcas',
            ]);

        //Auditor
            $auditor = Role::create(['name' => 'Auditor']);

            $auditor->givePermissionTo([
                //Roles
                    'roles.index',
                    'roles.show',
                //usuarios
                    'users.index',
                    'users.show',
                //Clientes
                    'clientes.index',
                    'clientes.show',
                //Solicitudes
                    'solicitudes.index',
                    'solicitudes.show',
                //Tareas
                    'tareas.index',
                    'tareas.show',
                //Maquinarias
                    'maquinarias.index',
                    'maquinarias.show',
                //Operarios
                    'operarios.index',
                    'operarios.show',
                //Mantenimientos
                    'mantenimientos.index',
                    'mantenimientos.show',
                //Trabajos
                    'trabajos.index',
                    'trabajos.show',
                //Marcas
                    'marcas.index',
                    'marcas.show',
                //Otros
                    'actividades',
                    'actividades.encargos',
                    'actividades.encargos.general',
                    'actividades.encargos.general.solicitudes',
                    'actividades.encargos.general.tareas',
                    'actividades.encargos.asignaciones',
                    'actividades.mantenimientos',
                    'actividades.mantenimientos.general',
                    'actividades.mantenimientos.general.mantenimientos',
                    'actividades.mantenimientos.general.trabajos',
                    'admin',
                    'admin.personas',
                    'admin.personas.administrativo',
                    'admin.personas.administrativo.funcionarios',
                    'admin.personas.administrativo.operarios',
                    'admin.personas.general',
                    'admin.personas.general.clientes',
                    'admin.vehiculos',
                    'admin.vehiculos.administrativo',
                    'admin.vehiculos.administrativo.maquinarias',
                    'admin.vehiculos.general',
                    'admin.vehiculos.general.marcas',
            ]);

        //Funcionario
            $funcionario = Role::create(['name' => 'Funcionario']);

            $funcionario->givePermissionTo([
                //Clientes
                    'clientes.index',
                    'clientes.edit',
                    'clientes.show',
                    'clientes.create',
                //Solicitudes
                    'solicitudes.index',
                    'solicitudes.edit',
                    'solicitudes.show',
                    'solicitudes.create',
                //Tareas
                    'tareas.index',
                    'tareas.edit',
                    'tareas.show',
                    'tareas.create',
                //Maquinarias
                    'maquinarias.index',
                    'maquinarias.show',
                //Operarios
                    'operarios.index',
                    'operarios.show',
                //Mantenimientos
                    'mantenimientos.index',
                    'mantenimientos.edit',
                    'mantenimientos.show',
                    'mantenimientos.create',
                //Trabajos
                    'trabajos.index',
                    'trabajos.edit',
                    'trabajos.show',
                    'trabajos.create',
                //Otros
                    'actividades',
                    'actividades.encargos',
                    'actividades.encargos.general',
                    'actividades.encargos.general.solicitudes',
                    'actividades.encargos.general.tareas',
                    'actividades.encargos.asignaciones',
                    'actividades.mantenimientos',
                    'actividades.mantenimientos.general',
                    'actividades.mantenimientos.general.mantenimientos',
                    'actividades.mantenimientos.general.trabajos',
                    'admin',
                    'admin.personas',
                    'admin.personas.administrativo',
                    'admin.personas.administrativo.operarios',
                    'admin.personas.general',
                    'admin.personas.general.clientes',
                    'admin.vehiculos',
                    'admin.vehiculos.administrativo',
                    'admin.vehiculos.administrativo.maquinarias',
            ]);

        //Supervisor
            $supervisor = Role::create(['name' => 'Supervisor']);

            $supervisor->givePermissionTo([
                //Usuarios
                    'users.index',
                    'users.show',
                    'users.create',
                //Clientes
                    'clientes.index',
                    'clientes.edit',
                    'clientes.show',
                    'clientes.create',
                //Solicitudes
                    'solicitudes.index',
                    'solicitudes.edit',
                    'solicitudes.show',
                    'solicitudes.create',
                    'solicitudes.revision',
                //Tareas
                    'tareas.index',
                    'tareas.edit',
                    'tareas.show',
                    'tareas.create',
                    'tareas.revision',
                //Maquinarias
                    'maquinarias.index',
                    'maquinarias.show',
                    'maquinarias.create',
                    'maquinarias.edit',
                //Operarios
                    'operarios.index',
                    'operarios.show',
                    'operarios.edit',
                    'operarios.create',
                //Mantenimientos
                    'mantenimientos.index',
                    'mantenimientos.edit',
                    'mantenimientos.revision',
                    'mantenimientos.show',
                    'mantenimientos.create',
                //Trabajos
                    'trabajos.index',
                    'trabajos.edit',
                    'trabajos.revision',
                    'trabajos.show',
                    'trabajos.create',
                    'trabajos.destroy',
                //Otros
                    'actividades',
                    'actividades.encargos',
                    'actividades.encargos.general',
                    'actividades.encargos.general.solicitudes',
                    'actividades.encargos.general.tareas',
                    'actividades.encargos.asignaciones',
                    'actividades.mantenimientos',
                    'actividades.mantenimientos.general',
                    'actividades.mantenimientos.general.mantenimientos',
                    'actividades.mantenimientos.general.trabajos',
                    'admin',
                    'admin.personas',
                    'admin.personas.administrativo',
                    'admin.personas.administrativo.operarios',
                    'admin.personas.general',
                    'admin.personas.general.clientes',
                    'admin.vehiculos',
                    'admin.vehiculos.administrativo',
                    'admin.vehiculos.administrativo.maquinarias',
            ]);

        //User Admin
            $user = User::find(1); //martin Ronquillo
            $user->assignRole('Acceso Total');

        //User Auditor
            $funcionario = User::find(2);
            $funcionario->assignRole('Supervisor');
    }
}

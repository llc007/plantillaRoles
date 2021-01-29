<?php

use Illuminate\Database\Seeder;
use App\User;
use App\TemplatePermisos\Models\Role;
use App\TemplatePermisos\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class templatePermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tablas
        DB::statement('SET foreign_key_checks=0');
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement('SET foreign_key_checks=1');
        //USer admin
        $userAdmin = User::where('email', 'admin@admin.com')->first();
        if ($userAdmin) {
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), // password
        ]);

        //Rol admin
        $rolAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'full-access' => 'yes'
        ]);

        //Usuario registrado
        $rolUser = Role::create([
            'name' => 'Registered User',
            'slug' => 'registereduser',
            'description' => 'Registered User',
            'full-access' => 'no'
        ]);

        //table role_user
        $userAdmin->roles()->sync([$rolAdmin->id]);

        //permission
        $permission_all = [];
//*******************************************************************************************
            //Permission ROle
            //1-INDEX
            $permission = Permission::create([
                'name' => 'List Role',
                'slug' => 'role.index',
                'description' => 'El usuario puede listar los roles',
            ]);

            $permission_all[]=$permission->id;

            //2-SHOW
            $permission = Permission::create([
                'name' => 'Show role',
                'slug' => 'role.show',
                'description' => 'El usuario puede ver los roles',
            ]);
            $permission_all[]=$permission->id;

            //3-CREATE
            $permission = Permission::create([
                'name' => 'Create role',
                'slug' => 'role.create',
                'description' => 'El usuario puede crear roles',
            ]);
            $permission_all[]=$permission->id;

            //4-EDIT
            $permission = Permission::create([
                'name' => 'Edit role',
                'slug' => 'role.edit',
                'description' => 'El usuario puede editar roles',
            ]);
            $permission_all[]=$permission->id;

            //5-DESTROY
            $permission = Permission::create([
                'name' => 'Destroy role',
                'slug' => 'role.destroy',
                'description' => 'El usuario puede eliminar roles',
            ]);
            $permission_all[]=$permission->id;

            //Permission Roles comentado porque ya tiene full access
//            $rolAdmin->permissions()->sync($permission_all);

//*******************************************************************************************
            //Permission USERS
            //1-INDEX
            $permission = Permission::create([
                'name' => 'List user',
                'slug' => 'user.index',
                'description' => 'El usuario puede listar los users',
            ]);

            $permission_all[]=$permission->id;

            //2-SHOW
            $permission = Permission::create([
                'name' => 'Show user',
                'slug' => 'user.show',
                'description' => 'El usuario puede ver los users',
            ]);
            $permission_all[]=$permission->id;

            //3-CREATE
            $permission = Permission::create([
                'name' => 'Create user',
                'slug' => 'user.create',
                'description' => 'El usuario puede crear users',
            ]);
            $permission_all[]=$permission->id;

            //4-EDIT
            $permission = Permission::create([
                'name' => 'Edit user',
                'slug' => 'user.edit',
                'description' => 'El usuario puede editar users',
            ]);
            $permission_all[]=$permission->id;

            //5-DESTROY
            $permission = Permission::create([
                'name' => 'Destroy user',
                'slug' => 'user.destroy',
                'description' => 'El usuario puede eliminar users',
            ]);
            $permission_all[]=$permission->id;

        //new
        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'El usuario puede ver su user',
        ]);
        $permission_all[]=$permission->id;

        //new
        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'El usuario puede editar su usuario',
        ]);
        $permission_all[]=$permission->id;

        //Permission Roles comentado porque ya tiene full access
//        $rolAdmin->permissions()->sync($permission_all);






    }
}

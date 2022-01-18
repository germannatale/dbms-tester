<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    private $menuId = null;
    private $dropdownId = array();
    private $dropdown = false;
    private $sequence = 1;
    private $joinData = array();
    private $adminRole = null;
    private $userRole = null;
    private $subFolder = '';

    public function join($roles, $menusId){
        $roles = explode(',', $roles);
        foreach($roles as $role){
            array_push($this->joinData, array('role_name' => $role, 'menus_id' => $menusId));
        }
    }

    /*
        Function assigns menu elements to roles
        Must by use on end of this seeder
    */
    public function joinAllByTransaction(){
        DB::beginTransaction();
        foreach($this->joinData as $data){
            DB::table('menu_role')->insert([
                'role_name' => $data['role_name'],
                'menus_id' => $data['menus_id'],
            ]);
        }
        DB::commit();
    }

    public function insertLink($roles, $name, $href, $icon = null){
        $href = $this->subFolder . $href;
        if($this->dropdown === false){
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'sequence' => $this->sequence
            ]);
        }else{
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'parent_id' => $this->dropdownId[count($this->dropdownId) - 1],
                'sequence' => $this->sequence
            ]);
        }
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        $permission = Permission::where('name', '=', $name)->get();
        if(empty($permission)){
            $permission = Permission::create(['name' => 'visit ' . $name]);
        }
        $roles = explode(',', $roles);
        if(in_array('user', $roles)){
            $this->userRole->givePermissionTo($permission);
        }
        if(in_array('admin', $roles)){
            $this->adminRole->givePermissionTo($permission);
        }
        return $lastId;
    }

    public function insertTitle($roles, $name){
        DB::table('menus')->insert([
            'slug' => 'title',
            'name' => $name,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence
        ]);
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function beginDropdown($roles, $name, $icon = ''){
        if(count($this->dropdownId)){
            $parentId = $this->dropdownId[count($this->dropdownId) - 1];
        }else{
            $parentId = null;
        }
        DB::table('menus')->insert([
            'slug' => 'dropdown',
            'name' => $name,
            'icon' => $icon,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence,
            'parent_id' => $parentId
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        array_push($this->dropdownId, $lastId);
        $this->dropdown = true;
        $this->sequence++;
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function endDropdown(){
        $this->dropdown = false;
        array_pop( $this->dropdownId );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        /* Get roles */
        $this->adminRole = Role::where('name' , '=' , 'admin' )->first();
        $this->userRole = Role::where('name', '=', 'user' )->first();
        $this->devRole = Role::where('name', '=', 'dev' )->first();

        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId

        /* Inicio */
        $this->insertLink('guest', 'Inicio', '/', 'fas fa-home');        
       
         /* Tests */
        $this->insertTitle('guest', 'Test');
        $this->insertLink('guest', 'Insert', 'test/insert', 'fas fa-plus');
        $this->insertLink('guest', 'Select', 'test/select', 'fas fa-search');        
        $this->insertLink('guest', 'Update', 'test/update', 'fas fa-edit');
        $this->insertLink('guest', 'Blob', 'test/blob', 'fas fa-file-alt');
        $this->insertLink('guest', 'Delete', 'test/delete', 'fas fa-trash-alt');

         /* Estadisticas */
        $this->insertTitle('guest', 'Estadísticas');        
        $this->insertLink('guest', 'VS Promedio', '/estadisticas/vs/promedio', 'fas fa-chart-pie');
        $this->insertLink('guest', 'VS Curvas', '/estadisticas/vs/curvas', 'fas fa-chart-line');   
        $this->insertLink('guest', 'MariaDB', '/estadisticas/motor/mariadb', 'fas fa-database');        
        $this->insertLink('guest', 'MongoDB', '/estadisticas/motor/mongodb', 'fas fa-database');        
        $this->insertLink('guest', 'PostgreSQL', '/estadisticas/motor/postgresql', 'fas fa-database');
        $this->insertLink('guest', 'Resultados', '/estadisticas/resultados', 'fas fa-list-ol');
        $this->insertLink('guest', 'Restaurar', '/estadisticas/restaurar', 'fas fa-recycle');
        
        $this->endDropdown();      

        /* Create top menu */
        // DB::table('menulist')->insert([
        //     'name' => 'top menu'
        // ]);
        // $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        // $this->beginDropdown('guest,user,admin', 'Vinculos');
        // $id = $this->insertLink('guest,user,admin', 'Panel',    '/');
        // $id = $this->insertLink('user,admin', 'Notas',              '/notes');
        // $id = $this->insertLink('admin', 'Usuarios',                   '/users');
        // $id = $this->insertLink('admin', 'Roles',              '/roles');
        // $this->endDropdown();
        // $id = $this->beginDropdown('dev', 'Settings');
        // $id = $this->insertLink('dev', 'Edit menu',               '/menu/menu');
        // $id = $this->insertLink('dev', 'Edit menu elements',      '/menu/element');        
        // $id = $this->insertLink('dev', 'Media',                   '/media');
        // $id = $this->insertLink('dev', 'BREAD',                   '/bread');
        // $this->endDropdown();

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}

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
        $this->estudiantetRole = Role::where('name' , '=' , 'estudiante' )->first();
        $this->devRole = Role::where('name', '=', 'dev' )->first();

        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->insertLink('user,estudiante,admin,dev', 'Inicio', '/', 'cil-home');
        $this->insertTitle('admin,dev', 'Administración');
        $this->insertLink('admin,dev', 'Usuarios',                   '/users', 'cil-user');
        $this->insertLink('admin,dev', 'Roles',              '/roles', 'cil-cog');
        $this->insertLink('admin,dev', 'Proveedores',              '/provedoores', 'cil-building');
        $this->insertTitle('user,estudiante,admin,dev', 'Simulador');
        $this->insertLink('user,estudiante,admin,dev', 'Inmuebles', '/inmuebles', 'cil-house');
        $this->insertLink('user,estudiante,admin,dev', 'Artefactos', '/artefactos', 'cil-tv');
        $this->insertLink('user,estudiante,admin,dev', 'Simulación', '/simulacion', 'cil-bolt');

        $this->insertLink('admin,dev', 'Panel', '/', 'cil-speedometer');
        $this->beginDropdown('dev', 'Settings', 'cil-calculator');
            $this->insertLink('dev', 'Notes',                   '/notes');
           
            $this->insertLink('dev', 'Edit menu',               '/menu/menu');
            $this->insertLink('dev', 'Edit menu elements',      '/menu/element');
            
            $this->insertLink('dev', 'Media',                   '/media');
            $this->insertLink('dev', 'BREAD',                   '/bread');
            $this->insertLink('dev', 'Email',                   '/mail');
        $this->endDropdown();
        $this->insertLink('guest', 'Ingresar', '/login', 'cil-account-logout');
        $this->insertLink('guest', 'Registrarse', '/register', 'cil-account-logout');
        $this->insertTitle('dev', 'Theme');
        $this->insertLink('dev', 'Colors', '/colors', 'cil-drop1');
        $this->insertLink('dev', 'Typography', '/typography', 'cil-pencil');
        $this->beginDropdown('dev', 'Base', 'cil-puzzle');
            $this->insertLink('dev', 'Breadcrumb',    '/base/breadcrumb');
            $this->insertLink('dev', 'Cards',         '/base/cards');
            $this->insertLink('dev', 'Carousel',      '/base/carousel');
            $this->insertLink('dev', 'Collapse',      '/base/collapse');
            $this->insertLink('dev', 'Forms',         '/base/forms');
            $this->insertLink('dev', 'Jumbotron',     '/base/jumbotron');
            $this->insertLink('dev', 'List group',    '/base/list-group');
            $this->insertLink('dev', 'Navs',          '/base/navs');
            $this->insertLink('dev', 'Pagination',    '/base/pagination');
            $this->insertLink('dev', 'Popovers',      '/base/popovers');
            $this->insertLink('dev', 'Progress',      '/base/progress');
            $this->insertLink('dev', 'Scrollspy',     '/base/scrollspy');
            $this->insertLink('dev', 'Switches',      '/base/switches');
            $this->insertLink('dev', 'Tables',        '/base/tables');
            $this->insertLink('dev', 'Tabs',          '/base/tabs');
            $this->insertLink('dev', 'Tooltips',      '/base/tooltips');
        $this->endDropdown();
            $this->beginDropdown('dev', 'Buttons', 'cil-cursor');
            $this->insertLink('dev', 'Buttons',           '/buttons/buttons');
            $this->insertLink('dev', 'Buttons Group',     '/buttons/button-group');
            $this->insertLink('dev', 'Dropdowns',         '/buttons/dropdowns');
            $this->insertLink('dev', 'Brand Buttons',     '/buttons/brand-buttons');
        $this->endDropdown();
        $this->insertLink('dev', 'Charts', '/charts', 'cil-chart-pie');
        $this->beginDropdown('dev', 'Icons', 'cil-star');
            $this->insertLink('dev', 'CoreUI Icons',      '/icon/coreui-icons');
            $this->insertLink('dev', 'Flags',             '/icon/flags');
            $this->insertLink('dev', 'Brands',            '/icon/brands');
        $this->endDropdown();
        $this->beginDropdown('dev', 'Notifications', 'cil-bell');
            $this->insertLink('dev', 'Alerts',     '/notifications/alerts');
            $this->insertLink('dev', 'Badge',      '/notifications/badge');
            $this->insertLink('dev', 'Modals',     '/notifications/modals');
        $this->endDropdown();
        $this->insertLink('dev', 'Widgets', '/widgets', 'cil-calculator');
        $this->insertTitle('dev', 'Extras');
        $this->beginDropdown('dev', 'Pages', 'cil-star');
            $this->insertLink('dev', 'Login',         '/login');
            $this->insertLink('dev', 'Register',      '/register');
            $this->insertLink('dev', 'Error 404',     '/404');
            $this->insertLink('dev', 'Error 500',     '/500');
        $this->endDropdown();      

        /* Create top menu */
        DB::table('menulist')->insert([
            'name' => 'top menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->beginDropdown('guest,user,admin', 'Vinculos');
        $id = $this->insertLink('guest,user,admin', 'Panel',    '/');
        $id = $this->insertLink('user,admin', 'Notas',              '/notes');
        $id = $this->insertLink('admin', 'Usuarios',                   '/users');
        $id = $this->insertLink('admin', 'Roles',              '/roles');
        $this->endDropdown();
        $id = $this->beginDropdown('dev', 'Settings');
        $id = $this->insertLink('dev', 'Edit menu',               '/menu/menu');
        $id = $this->insertLink('dev', 'Edit menu elements',      '/menu/element');        
        $id = $this->insertLink('dev', 'Media',                   '/media');
        $id = $this->insertLink('dev', 'BREAD',                   '/bread');
        $this->endDropdown();

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}

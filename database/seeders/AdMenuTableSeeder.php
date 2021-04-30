<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ad_menu')->delete();
        
        \DB::table('ad_menu')->insert(array (
            0 => 
            array (
                'id' => 159,
                'name' => 'Homepage',
                'url' => '/',
                'parent_id' => 0,
                'icons' => 'fas fa-home',
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-02-18 13:08:36',
                'status' => 1,
                'deleted_at' => NULL,
                
                'menu_title' => 0,
            ),
            1 => 
            array (
                'id' => 160,
                'name' => 'Monitoring',
                'url' => '/manufacture/monitoring',
                'parent_id' => 0,
                'icons' => 'fas fa-tv',
                
                'target' => '_self',
                'order' => 1,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            2 => 
            array (
                'id' => 161,
                'name' => 'Data Output Log',
                'url' => '/manufacture/report',
                'parent_id' => 175,
                'icons' => 'far fa-chart-bar',
                
                'target' => '_self',
                'order' => 3,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            3 => 
            array (
                'id' => 162,
                'name' => 'Plan',
                'url' => '/manufacture/plan',
                'parent_id' => 175,
                'icons' => 'fas fa-calendar-check',
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            4 => 
            array (
                'id' => 163,
                'name' => 'Efficiency of Items',
                'url' => '/manufacture/efficiency',
                'parent_id' => 175,
                'icons' => 'fas fa-chart-line',
                
                'target' => '_self',
                'order' => 4,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            5 => 
            array (
                'id' => 164,
                'name' => 'Category',
                'url' => '#',
                'parent_id' => 0,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 3,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 1,
            ),
            6 => 
            array (
                'id' => 165,
                'name' => 'Device',
                'url' => '/manufacture/device',
                'parent_id' => 164,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 2,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            7 => 
            array (
                'id' => 166,
                'name' => 'Item Code',
                'url' => '/manufacture/itemCode',
                'parent_id' => 164,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 6,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            8 => 
            array (
                'id' => 167,
                'name' => 'Downtime Code',
                'url' => '/manufacture/downtimeCode',
                'parent_id' => 164,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 4,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            9 => 
            array (
                'id' => 168,
                'name' => 'Section',
                'url' => '/manufacture/section',
                'parent_id' => 164,
                'icons' => 'fas fa-th-large',
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            10 => 
            array (
                'id' => 170,
                'name' => 'Monitor',
                'url' => '/manufacture/monitor',
                'parent_id' => 164,
                'icons' => 'fas fa-tv',
                
                'target' => '_self',
                'order' => 5,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            11 => 
            array (
                'id' => 171,
                'name' => 'System',
                'url' => '#',
                'parent_id' => 0,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 4,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-02-18 13:08:36',
                'status' => 1,
                'deleted_at' => NULL,
                
                'menu_title' => 1,
            ),
            12 => 
            array (
                'id' => 172,
                'name' => 'User',
                'url' => '/user',
                'parent_id' => 171,
                'icons' => 'fas fa-user',
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-02-18 10:52:54',
                'status' => 1,
                'deleted_at' => NULL,
                
                'menu_title' => 0,
            ),
            13 => 
            array (
                'id' => 173,
                'name' => 'Role',
                'url' => '/role',
                'parent_id' => 171,
                'icons' => 'fas fa-users',
                
                'target' => '_self',
                'order' => 1,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-02-18 10:52:54',
                'status' => 1,
                'deleted_at' => NULL,
                
                'menu_title' => 0,
            ),
            14 => 
            array (
                'id' => 175,
                'name' => 'MANUFACTURE',
                'url' => '#',
                'parent_id' => 0,
                'icons' => 'fab fa-accusoft',
                
                'target' => '_self',
                'order' => 2,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 1,
            ),
            15 => 
            array (
                'id' => 176,
                'name' => 'Breaktime config',
                'url' => '/manufacture/device/breaktime',
                'parent_id' => 175,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 1,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            16 => 
            array (
                'id' => 177,
                'name' => 'Group Item',
                'url' => '/manufacture/groupItem',
                'parent_id' => 164,
                'icons' => 'fab fa-500px',
                
                'target' => '_self',
                'order' => 3,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            17 => 
            array (
                'id' => 178,
                'name' => 'Draft Efficiency',
                'url' => '/manufacture/efficiencyjanofsectionstride',
                'parent_id' => 175,
                'icons' => 'fas fa-align-left',
                
                'target' => '_self',
                'order' => 2,
                'route' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-04-10 15:45:44',
                'status' => 1,
                'deleted_at' => '2021-04-10 15:45:44',
                
                'menu_title' => 0,
            ),
            18 => 
            array (
                'id' => 179,
                'name' => 'tesst',
                'url' => 'ss',
                'parent_id' => 0,
                'icons' => '',
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => '2021-01-27 03:10:00',
                'updated_at' => '2021-01-27 03:18:48',
                'status' => 1,
                'deleted_at' => '2021-01-27 03:18:48',
                
                'menu_title' => 0,
            ),
            19 => 
            array (
                'id' => 180,
                'name' => 'hihi',
                'url' => 'hihi',
                'parent_id' => 0,
                'icons' => '',
                
                'target' => '_blank',
                'order' => 0,
                'route' => NULL,
                'created_at' => '2021-01-27 03:22:26',
                'updated_at' => '2021-01-27 03:30:38',
                'status' => 1,
                'deleted_at' => '2021-01-27 03:30:38',
                
                'menu_title' => 0,
            ),
            20 => 
            array (
                'id' => 181,
                'name' => 'ss',
                'url' => 'ss',
                'parent_id' => 0,
                'icons' => '',
                
                'target' => '_blank',
                'order' => 0,
                'route' => NULL,
                'created_at' => '2021-01-27 03:29:54',
                'updated_at' => '2021-01-27 03:30:30',
                'status' => 1,
                'deleted_at' => '2021-01-27 03:30:30',
                
                'menu_title' => 0,
            ),
            21 => 
            array (
                'id' => 182,
                'name' => 'Menu',
                'url' => '/menu',
                'parent_id' => 171,
                'icons' => 'fas fa-align-justify',
                
                'target' => '_self',
                'order' => 2,
                'route' => NULL,
                'created_at' => '2021-01-27 04:58:00',
                'updated_at' => '2021-02-18 10:52:54',
                'status' => 1,
                'deleted_at' => NULL,
                
                'menu_title' => 0,
            ),
            22 => 
            array (
                'id' => 183,
                'name' => 'Test',
                'url' => NULL,
                'parent_id' => 0,
                'icons' => NULL,
                
                'target' => '_self',
                'order' => 0,
                'route' => NULL,
                'created_at' => '2021-01-27 05:49:23',
                'updated_at' => '2021-01-27 05:49:31',
                'status' => 1,
                'deleted_at' => '2021-01-27 05:49:31',
                
                'menu_title' => 0,
            ),
        ));
        
        
    }
}
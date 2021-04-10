<?php

namespace Core\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Core\Menu\Entities\Menu;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $menu = Menu::firstOrCreate(['name' => 'Trang chủ', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ1', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ2', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ3', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ4', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ5', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ1', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ2', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ3', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ4', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ5', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ1', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ2', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ3', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ4', 'url' => '#', 'parent_id' => 0 ]);
        $menu = Menu::create(['name' => 'Trang chủ5', 'url' => '#', 'parent_id' => 0 ]);

        // $this->call("SeedMenuDataTableSeeder");
    }
}

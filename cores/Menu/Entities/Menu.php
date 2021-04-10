<?php

namespace Core\Menu\Entities;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasPermissions;

class Menu extends Model
{
    use HasPermissions;
    use SoftDeletes;
    use Compoships;
    protected $softDelete = true;

    protected $guard_name = 'web'; // or whatever guard you want to use

    protected $table = 'ad_menu';
    protected $fillable = ['name', 'url', 'parent_id', 'icons', 'status'];


    public function children()
    {
        return $this->hasMany(self::class, "parent_id", "id")->with('children');;
    }

    public function parent()
    {
        return $this->belongsTo(self::class, "parent_id", "id");
    }

    public static function getAllMenuBuilded(){
        $rawMenu = self::getAllMenu();

        $listMenu = self::buildMenu($rawMenu);
        return $listMenu;
    }
    private static function buildMenu(array $rawMenu , int $parentId = 0 ):array{
        $listMenu = array_filter ( $rawMenu , function ($menu)use($parentId){
            return  $menu["parent_id"] == $parentId;
        });
        foreach ($listMenu as &$menu){
            $menu["childrens"] = self::buildMenu($rawMenu, $menu["id"]);
        }
        return $listMenu;
    }
    private static function getAllMenu(){
        $menus = self::select('ad_menu.*','model_has_roles.model_id')
            ->join('model_has_permissions','ad_menu.id','model_has_permissions.model_id')
            ->join('role_has_permissions','role_has_permissions.permission_id','model_has_permissions.permission_id')
            ->join('roles','role_has_permissions.role_id','roles.id')
            ->join('model_has_roles','roles.id','model_has_roles.role_id')
            ->where('model_has_roles.model_id',Auth::id())
            ->whereNull('ad_menu.deleted_at')
            ->where('ad_menu.status',1)
            ->groupBy('id','name','url','parent_id','icons','model_type','target','order','route','created_at','updated_at','status','deleted_at','default_monitor_id','menu_title','model_id')
            ->orderBy('order')
            ->get()->toArray();
        return $menus;
    }
}

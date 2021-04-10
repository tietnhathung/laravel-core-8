<?php

namespace Core\Menu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Core\Logging\Helpers\LoggingHelper;
use Core\Menu\Entities\Menu;
use Core\Menu\Helpers\MenuHelper;
use Core\Menu\Http\Requests\MenuEditRequest;
use Core\Menu\Http\Requests\MenuRequest;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{

    protected $index_page;

    public function __construct()
    {
        $this->index_page = 'menu.index';
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $menus =  Menu::with("children")->orderBy(DB::raw('ABS(`order`)'))->orderBy('id', 'ASC')->get();
        $menuTree = MenuHelper::buildTreeMenu($menus, 0);
        $this->_data ['menuTree'] = $menuTree;
        return view('menu::index', $this->_data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $fileJson =  __DIR__."./../../Resources/assets/json/font-awesome.json";
        $listIcon = json_decode(file_get_contents($fileJson), true);

        $obj = new Menu();
        $menus =  Menu::orderBy(DB::raw('ABS(`order`)'))->orderBy('id', 'ASC')->get();
        $mTree = array();
        MenuHelper::buildTreeMenu_select($menus, $mTree, 0);
        $m = collect($mTree);
        $menuTree = $m->pluck("text", "value");
        $menuTree->prepend ( 'Chọn Menu', '0' );
        $permission_list = Permission::all();
        $obj->permissions = $obj->permissions()->pluck("id")->toArray();
        return view('menu::create', compact('obj', 'menuTree', 'permission_list','listIcon') );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(MenuRequest $request)
    {
        $obj = Menu::create ( $request->except ( [ ] ) );
        $obj->target = isset($request->target)?"_blank":"_self";
        $obj->parent_id=(int)$obj->parent_id;
        $obj->status=(int)$request->status;

        if ($request->has ( [
            'error_description'
        ] )) {
            $errors = implode ( ',', $request->error_description );
        }

        $obj->save();

        $permissions = null;
        if (is_array($request->permissions)) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
        }

        $obj->syncPermissions($permissions);

        session()->forget('admin_menus');

        LoggingHelper::infor("","Thêm menu ",$obj->name);

        return redirect ( route($this->index_page))->with ( 'flash-message', "Bạn đã thêm dữ liệu thành công" );
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $fileJson =  __DIR__."./../../Resources/assets/json/font-awesome.json";
        $listIcon = json_decode(file_get_contents($fileJson), true);

        $obj = Menu::find($id);
        $menus =  Menu::orderBy(DB::raw('ABS(`order`)'))->orderBy('id', 'ASC')->get();
        $mTree = array();
        MenuHelper::buildTreeMenu_select($menus, $mTree, 0);
        $m = collect($mTree);
        $menuTree = $m->pluck("text", "value");
        $menuTree->prepend ( 'Chọn Menu', '0' );

        $permission_list = Permission::all();
        $obj->permissions = $obj->permissions()->pluck("id")->toArray();

//        $menuTree = MenuHelper::buildTreeMenu($menus, 0);
        return view ( 'menu::edit', compact('obj', 'menuTree', 'permission_list','listIcon') );
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(MenuEditRequest $request, $id)
    {


        $obj = Menu::find($id);
        $obj->name = $request->name;
        $obj->parent_id = (int)$request->parent_id;
        $obj->url = $request->url;
        $obj->icons = $request->icons;
        $obj->status=(int)$request->status;
        $obj->target = isset($request->target)?"_blank":"_self";
        $obj->save();

        $permissions = null;
        if (is_array($request->permissions)) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();

        }
        $obj->syncPermissions($permissions);
        LoggingHelper::infor("","Edit menu ",$obj->name);
        session()->forget('admin_menus');
        return redirect ( route($this->index_page))->with ( 'flash-message', "Bạn đã cập nhật dữ liệu thành công" );
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        //
        if (! is_numeric ( $id )) {
            redirect ( route($this->index_page))->with ( "flash-message", "Dữ liệu không tồn tại" );
            return;
        }
        $obj= Menu::find($id);
        $obj->delete ();


        \Session::flash('flash-message', 'Bạn đã xóa thành công!');
        LoggingHelper::infor("","Xóa menu ",$obj->name);
        session()->forget('admin_menus');
        return response()->json(["message"=>"Bạn đã xóa menu thành công"]);
//        \Session::flash('flash-message', 'Bạn đã xóa thành công!');
//        return redirect ( route($this->index_page))->with ( "flash-message", "Bạn đã xóa thành công" );
    }


    public function destroyMany(Request $request) {
        $ids = $request->id;

        $check = true;
        if (is_array($ids)) {
            foreach ($ids as $id) {
                if ($id != (int) $id) {
                    $check = false;
                }
            }
        } else {
            $ids = (int)$ids;
            if ($ids>0) {
                $this->destroy($ids);
                return redirect ( route($this->index_page));
            }

            $check = false;
        }
        session()->forget('admin_menus');
        if ($check) {
            Menu::whereIn('id', $ids)->delete();
            LoggingHelper::infor("","Xóa nhiều menu ","");

            return redirect ( route($this->index_page))->with ( "flash-message", "Bạn đã xóa thành công" );
        }
        return redirect ( route($this->index_page))->with ( "error", "Dữ liệu lỗi, Please try again" );

    }

    public function updateStatus(Request $request) {
        $id = (int)$request->id;
        if ($id<1) return abort(400, "Không tìm thấy dữ liệu hợp lệ");
        $status = (int)$request->status;
        $status = ($status==0)?0:1;

        $obj = Menu::find($id);
        if (!$obj) return abort(400, "Không tìm thấy dữ liệu hợp lệ");

        $obj->status = $status;
        $obj->save();
        LoggingHelper::infor("","Thay đổi trạng thái menu ",$obj->name);
        session()->forget('admin_menus');
       return response()->json(["status" => 0, "message" => "Cập nhật dữ liệu thành công"]);

    }

    public function updateOrder(Request $request) {

        $id = (int)$request->id;
        $action = $request->order;

        if ($id<1) return abort(500, "Dữ liệu không hợp lệ hoặc không được quyền truy cập.");
        $obj = Menu::find($id);
        if (!$obj) return abort(500, "Dữ liệu không hợp lệ hoặc không được quyền truy cập.");

        $siblings = Menu::where("parent_id", $obj->parent_id)->orderBy(DB::raw('ABS(`order`)'))->get();
        $bfItem = array();
        $afItem = array();
        $lastItem = null;
        $bfOk = false;
        $afOk = false;
        $order = 1;

        foreach ($siblings as $item) {
//            if ($item->id == $obj->id) {
//                $obj->order = $order;
//                continue;
//            }

            if ($item->order != $order) {
                $item->order = $order;
                $item->save();
            }

            $order++;
            if (!$bfOk) {
                if ($item->id == $id) {
                    $bfItem = $lastItem;
                    $bfOk = true;
                }
            }

            if (!$afOk) {
                if ($lastItem != null && $lastItem->id == $id) {
                    $afItem = $item;
                    $afOk = true;
                }
            }

            $lastItem = $item;
        }

        if (strcmp($action, "up") == 0 ) {

            if (!$bfItem) return abort(500, "Thao tác không hợp lệ");
            $tg = $bfItem->order;
            $bfItem->order = $obj->order;
            $obj->order = $tg;
            $bfItem->save();
            $obj->save();
        }

        if (strcmp($action, "down") == 0) {
            if (!$afItem) return abort(500, "Thao tác không hợp lệ");
            $tg = $afItem->order;
            $afItem->order = $obj->order;
            $obj->order = $tg;
            $afItem->save();
            $obj->save();
        }
        LoggingHelper::infor("","Sắp xếp lại thứ tự menu ","");
        session()->forget('admin_menus');
        return response()->json(["status" => 0, "message" => "Cập nhật dữ liệu thành công"]);
//        $obj->save();
    }
}

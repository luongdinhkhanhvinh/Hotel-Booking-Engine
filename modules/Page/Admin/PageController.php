<?php
namespace Modules\Page\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Page\Models\Page;
use Modules\Template\Models\Template;

class PageController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/page');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $page_name = $request->query('page');
        $datapage = new Page;
        if ($page_name) {
            $datapage = Page::where('title', 'LIKE', '%' . $page_name . '%');
        }
        $datapage = $datapage->orderBy('title', 'asc');
        $data = [
            'rows'        => $datapage->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => __('Trang'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('Tất cả'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Page::admin.index', $data);
    }

    public function create(Request $request)
    {
        if (!empty($request->input())) {
            $row = new Page($request->input());
            if ($row->save()) {
                $row->saveSEO($request);
                return redirect('admin/module/page')->with('success', __('Trang được tạo'));
            }
        } else {
            $row = new Page();
            $row->fill([
                'status' => 'publish',
            ]);
        }
        $data = [
            'row'         => $row,
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Trang'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('Thêm trang'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Page::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = Page::find($id);
        if (empty($row)) {
            return redirect('admin/module/page');
        }
        if (!empty($request->input())) {
            $row->fill($request->input());
            if ($row->save()) {
                $row->saveSEO($request);
                return redirect('admin/module/page')->with('success', __('Trang được cập nhặt'));
            }
        }
        $data = [
            'row'         => $row,
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Trang'),
                    'url'  => 'admin/module/page'
                ],
                [
                    'name'  => __('Sửa trang'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Page::admin.detail', $data);
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = Page::select('id', 'title as text');
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids)) {
            return redirect()->back()->with('error', __('Vui lòng chọn ít nhất một mục!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Không có hoạt động nào được chọn!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = Page::where("id", $id);
                if (!$this->hasPermission('page_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('page_delete');
                }
                $query->first()->delete();
            }
        } else {
            foreach ($ids as $id) {
                $query = Page::where("id", $id);
                if (!$this->hasPermission('page_manage_others')) {
                    $query->where("create_user", Auth::id());
                    $this->checkPermission('page_update');
                }
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Cập nhật thành công!'));
    }
}
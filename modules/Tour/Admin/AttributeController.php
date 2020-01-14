<?php
namespace Modules\Tour\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\AdminController;
use Modules\Core\Models\Attributes;
use Modules\Core\Models\Terms;

class AttributeController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/tour');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $data = [
            'rows'        => Attributes::where("service", 'tour')->get(),
            'row'         => new Attributes(),
            'breadcrumbs' => [
                [
                    'name' => __('Chuyến đi'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name'  => __('Thuộc tính'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.attribute.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = Attributes::find($id);
        if (empty($row)) {
            abort(404);
        }
        $this->checkPermission('tour_manage_attributes');
        $data = [
            'rows'        => Attributes::where("service", 'tour')->get(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Chuyến đi'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name' => __('Thuộc tính'),
                    'url'  => 'admin/module/tour/attribute'
                ],
                [
                    'name'  => __('Thuộc tính: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.attribute.detail', $data);
    }

    public function store(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        if ($id) {
            $row = Attributes::find($id);
            if (empty($row)) {
                abort(404);
            }
            $row->fill($request->input());
        } else {
            $row = new Attributes($request->input());
            $row->service = 'tour';
        }
        if ($row->save()) {
            return redirect()->back()->with('success', __('Lưu thuộc tính'));
        }
    }

    public function terms(Request $request, $attr_id)
    {
        $this->checkPermission('tour_manage_attributes');
        $row = Attributes::find($attr_id);
        if (empty($row)) {
            abort(404);
        }
        $data = [
            'rows'        => Terms::where("attr_id", $attr_id)->paginate(20),
            'attr'        => $row,
            "row"         => new Terms(),
            'breadcrumbs' => [
                [
                    'name' => __('Chuyến đi'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name' => __('Thuộc tính'),
                    'url'  => 'admin/module/tour/attribute'
                ],
                [
                    'name'  => __('Thuộc tính: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.terms.index', $data);
    }

    public function term_store(Request $request)
    {
        $this->checkPermission('tour_manage_attributes');
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = $request->input('id');
        if ($id) {
            $row = Terms::find($id);
            if (empty($row)) {
                abort(404);
            }
            $row->fill($request->input());
        } else {
            $row = new Terms($request->input());
            $row->attr_id = $request->input('attr_id');
        }
        if ($row->save()) {
            return redirect()->back()->with('success', __('Lưu thời hạn'));
        }
    }

    public function term_edit(Request $request, $id)
    {
        $this->checkPermission('tour_manage_attributes');
        $row = Terms::find($id);
        if (empty($row)) {
            return redirect()->back()->with('error', __('Thời hạn không tìm thấy'));
        }
        $attr = Attributes::find($row->attr_id);
        $data = [
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Chuyến đi'),
                    'url'  => 'admin/module/tour'
                ],
                [
                    'name' => __('Thuộc tính'),
                    'url'  => 'admin/module/tour/attribute'
                ],
                [
                    'name' => $attr->name,
                    'url'  => 'admin/module/tour/attribute/terms/' . $row->attr_id
                ],
                [
                    'name'  => __('Thời hạn: :name', ['name' => $row->name]),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Tour::admin.terms.detail', $data);
    }
}

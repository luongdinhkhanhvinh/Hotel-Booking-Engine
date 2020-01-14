<?php
namespace Modules\Tour\Blocks;

use Modules\Template\Blocks\BaseBlock;

class Testimonial extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Tiêu đề')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('Danh sách mục'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'name',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Tên')
                        ],
                        [
                            'id'    => 'desc',
                            'type'  => 'textArea',
                            'label' => __('Desc')
                        ],
                        [
                            'id'        => 'number_star',
                            'type'      => 'input',
                            'inputType' => 'number',
                            'label'     => __('Số sao')
                        ],
                        [
                            'id'    => 'avatar',
                            'type'  => 'uploader',
                            'label' => __('Hình ảnh đại điện')
                        ],
                    ]
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('List Testimonial');
    }

    public function content($model = [])
    {
        return view('Tour::frontend.blocks.testimonial.index', $model);
    }
}
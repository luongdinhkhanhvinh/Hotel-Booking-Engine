<?php
namespace Modules\Template\Blocks;
class Text extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'    => 'content',
                    'type'  => 'textArea',
                    'label' => __('Nội dung')
                ],
                [
                    'id'    => 'content2',
                    'type'  => 'editor',
                    'label' => __('Biên tập viên')
                ],
                [
                    'id'        => 'class',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Lớp Bọc (opt)')
                ],
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('Lớp Bọc (opt)'),
                    'title_field' => 'class',
                    'settings'    => [
                        [
                            'id'        => 'class',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => "Input"
                        ],
                        [
                            'id'    => 'content',
                            'type'  => 'textArea',
                            'label' => __('Nội dung')
                        ]
                    ]
                ],
                [
                    'id'    => 'bg',
                    'type'  => 'uploader',
                    'label' => __('Đăng hình ảnh')
                ],
            ]
        ]);
    }

    public function getName()
    {
        return __('Chữ');
    }
}
<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostCategory;
use App\Services\PostCategoryService;
use Livewire\Component;

class CreatePostCategory extends Component
{
    protected $listeners = [
        'delete'
    ];

    public $post, $name, $is_edit;

    public function render()
    {
        $categories = PostCategoryService::all();

        return view('livewire.admin.create-post-category', compact('categories'));
    }

    public function mount($post = null)
    {
        $this->post = $post;
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('Swal:confirm', [
            'title' => __('admin.swal-title'),
            'text' => __('admin.swal-text'),
            'id' => $id,
        ]);
    }

    public function store()
    {
        $data = $this->validate(
            [
                'name' => ['required', 'string', 'max:255', 'unique:post_categories,name->' . _lang()],
            ],
            null,
            [
                'name' => __('admin.name'),
            ]
        );

        $data['position'] = PostCategory::max('position') + 1;

        PostCategory::create($data);

        $this->dispatchBrowserEvent('Swal:success', [
            'title' => __('admin.added'),
        ]);

        $this->reset();
    }
}

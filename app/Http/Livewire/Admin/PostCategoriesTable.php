<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostCategory;
use App\Services\PostCategoryService;
use Livewire\Component;
use Livewire\WithPagination;

class PostCategoriesTable extends Component
{
    use WithPagination;

    protected $listeners = [
        'delete'
    ];

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $orderBy = 'position';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $status = 'all';

    public function render()
    {
        $postCategories = PostCategoryService::withFilter($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = PostCategory::max('position');
        
        return view('livewire.admin.post-categories-table', compact('postCategories', 'maxPosition'));
    }

    public function updating()
    {
        $this->gotoPage(1);
    }
    
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('Swal:confirm', [
            'title' => __('admin.swal-title'),
            'text' => __('admin.swal-text'),
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        PostCategoryService::delete($id);
    }

    public function changeColumn($id, $column)
    {
        PostCategoryService::changeColumn($id, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';
     
        PostCategoryService::changePosition($id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
     
        PostCategoryService::changePosition($id, 'down');
    }
}

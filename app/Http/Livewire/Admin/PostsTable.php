<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
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
        $posts = PostService::all($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = Post::max('position');
        
        return view('livewire.admin.posts-table', compact('posts', 'maxPosition'));
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
        PostService::delete($id);
    }

    public function changeStatus($id)
    {
        PostService::changeStatus($id);
    }

    public function up($id)
    {
        PostService::changePosition($id, 'up');
    }

    public function down($id)
    {
        PostService::changePosition($id, 'down');
    }
}

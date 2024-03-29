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
        $posts = PostService::withFilter($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = Post::max('position');
        
        return view('livewire.admin.posts-table', ['posts' => $posts, 'maxPosition' => $maxPosition]);
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
        PostService::deleteFiles(Post::class, $id, 'images/posts', 'image');
        PostService::delete(Post::class, $id);
    }

    public function changeColumn($id, $column)
    {
        PostService::changeColumn(Post::class, $id, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';

        PostService::changePosition(Post::class, $id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
        
        PostService::changePosition(Post::class, $id, 'down');
    }
}

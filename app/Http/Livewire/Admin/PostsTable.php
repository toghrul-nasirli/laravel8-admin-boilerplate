<?php

namespace App\Http\Livewire\Admin;

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
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;

    public function render()
    {
        $posts = PostService::all($this->search, $this->orderBy, $this->orderDirection, $this->perPage);
        
        return view('livewire.admin.posts-table', compact('posts'));
    }

    public function updating()
    {
        $this->gotoPage(1);
    }
    
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('Swal:confirm', [
            'title' => 'Silmək istədiyinizdən əminsiniz?',
            'text' => 'Bunu geri ala bilməyəcəksiniz!',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        PostService::delete($id);
    }
}

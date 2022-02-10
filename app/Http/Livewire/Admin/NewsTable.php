<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use App\Services\NewsService;
use Livewire\Component;
use Livewire\WithPagination;

class NewsTable extends Component
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
        $allNews = NewsService::all($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = News::max('position');
        
        return view('livewire.admin.news-table', compact('allNews', 'maxPosition'));
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
        NewsService::delete($id);
    }

    public function changeStatus($id)
    {
        NewsService::changeStatus($id);
    }

    public function up($id)
    {
        $this->orderBy = 'position';

        NewsService::changePosition($id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
        
        NewsService::changePosition($id, 'down');
    }
}

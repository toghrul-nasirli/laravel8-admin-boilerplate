<?php

namespace App\Http\Livewire\Admin;

use App\Models\Social;
use App\Services\SocialService;
use Livewire\Component;
use Livewire\WithPagination;

class SocialsTable extends Component
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
        $socials = SocialService::withFilter($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = Social::max('position');

        return view('livewire.admin.socials-table', compact('socials', 'maxPosition'));
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
        SocialService::delete($id, 'images/socials');
    }

    public function changeColumn($id, $column)
    {
        SocialService::changeColumn($id, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';
        
        SocialService::changePosition($id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
        
        SocialService::changePosition($id, 'down');
    }
}

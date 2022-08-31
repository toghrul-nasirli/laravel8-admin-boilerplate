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

        return view('livewire.admin.socials-table', ['socials' => $socials, 'maxPosition' => $maxPosition]);
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
        SocialService::deleteFiles(Social::class, $id, 'images/socials', 'image');
        SocialService::delete(Social::class, $id);
    }

    public function changeColumn($id, $column)
    {
        SocialService::changeColumn(Social::class, $id, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';

        SocialService::changePosition(Social::class, $id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
        
        SocialService::changePosition(Social::class, $id, 'down');
    }
}

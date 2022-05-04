<?php

namespace App\Http\Livewire\Admin;

use App\Models\Translation;
use App\Services\TranslationService;
use Livewire\Component;
use Livewire\WithPagination;

class TranslationsTable extends Component
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
    public $group;

    public function mount($group)
    {
        $this->group = $group;
    }

    public function render()
    {
        $translations = TranslationService::withFilter($this->search, $this->group, $this->orderBy, $this->orderDirection, $this->perPage);

        return view('livewire.admin.translations-table', compact('translations'));
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
        TranslationService::delete($id, Translation::class);
    }
}

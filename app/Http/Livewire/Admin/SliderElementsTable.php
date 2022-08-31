<?php

namespace App\Http\Livewire\Admin;

use App\Models\SliderElement;
use App\Services\SliderElementService;
use Livewire\Component;
use Livewire\WithPagination;

class SliderElementsTable extends Component
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
        $sliderElements = SliderElementService::withFilter($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = SliderElement::max('position');
        
        return view('livewire.admin.slider-elements-table', ['sliderElements' => $sliderElements, 'maxPosition' => $maxPosition]);
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
        SliderElementService::deleteFiles(SliderElement::class, $id, 'images/slider-elements', 'image');
        SliderElementService::delete(SliderElement::class, $id);
    }

    public function changeColumn($id, $column)
    {
        SliderElementService::changeColumn(SliderElement::class, $id, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';

        SliderElementService::changePosition(SliderElement::class, $id, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
        
        SliderElementService::changePosition(SliderElement::class, $id, 'down');
    }
}

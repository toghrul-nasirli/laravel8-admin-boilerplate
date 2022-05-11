<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Image;
use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;

class ImagesTable extends Component
{
    use WithPagination;

    protected $listeners = [
        'delete'
    ];

    protected $paginationTheme = 'bootstrap';

    public $product;
    public $search = '';
    public $orderBy = 'position';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $status = 'all';

    public function render()
    {
        $images = ImageService::withFilter($this->product, $this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->status);
        $maxPosition = $this->product->images()->max('position');
        
        return view('livewire.admin.product.images-table', compact('images', 'maxPosition'));
    }

    public function mount($product)
    {
        $this->product = $product;
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
        ImageService::delete($id, Image::class, 'images/imageables');
    }

    public function changeColumn($id, $column)
    {
        ImageService::changeColumn($id, Image::class, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';
     
        ImageService::changePosition($id, Image::class, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
     
        ImageService::changePosition($id, Image::class, 'down');
    }
}

<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'delete'
    ];

    public $product_id, $parent_id, $image, $name, $text, $description, $keywords;
    public $is_uploaded = false;

    public function render()
    {
        $products = ProductService::all();

        return view('livewire.admin.product.products', compact('products'));
    }

    public function updatedImage()
    {
        $this->is_uploaded = true;
    }

    public function resetData()
    {
        $this->parent_id = null;
        $this->image = null;
        $this->is_uploaded = false;
        $this->name = '';
        $this->text = '';
        $this->description = '';
        $this->keywords = '';
        $this->resetErrorBag();
    }

    public function create($id)
    {
        $this->parent_id = $id;
        $this->product_id = null;
        $this->is_uploaded = false;
        $this->name = '';
        $this->text = '';
        $this->description = '';
        $this->keywords = '';
        $this->emit('reset-text');
    }

    public function edit($id)
    {
        $this->resetData();
        
        $this->dispatchBrowserEvent('update-text', [
            'text' => $this->text,
        ]);
        
        $this->is_uploaded = false;
        
        $service = Product::findOrFail($id);
        $this->product_id = $id;
        $this->image = $service->image;
        $this->name = $service->name;
        $this->text = $service->text;
        $this->description = $service->description;
        $this->keywords = $service->keywords;
    }

    public function store()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255']
        ];

        $attributes = [
            'image' => __('admin.image'),
            'name' => __('admin.name'),
            'text' => __('admin.text'),
            'description' => __('admin.meta-description'),
            'keywords' => __('admin.meta-keywords'),
        ];
        
        if ($this->is_uploaded) $rules['image'] = ['nullable', 'image', 'max:2048'];

        $data = $this->validate($rules, null, $attributes);

        if (!$this->product_id) {
            $data['position'] = Product::where('parent_id', $this->parent_id)->max('position') + 1;
            $data['parent_id'] = $this->parent_id;

            if ($this->is_uploaded) _deleteFile('images/products', $data['image']);
        }

        if ($this->is_uploaded) $data['image'] = _storeImage('products', $data['image']);

        $data['slug'] = _slugify($data['name']);

        Product::updateOrCreate(['id' => $this->product_id], $data);

        $this->dispatchBrowserEvent('Swal:success', [
            'title' => $this->product_id ? __('admin.saved') : __('admin.added'),
        ]);
        
        $this->emit('stored');
        $this->resetData();
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
        ProductService::delete($id, Product::class, 'images/products');
    }

    public function changeColumn($id, $column)
    {
        ProductService::changeColumn($id, Product::class, $column);
    }

    public function up($id)
    {
        $this->orderBy = 'position';
      
        ProductService::changePosition($id, Product::class, 'up');
    }

    public function down($id)
    {
        $this->orderBy = 'position';
      
        ProductService::changePosition($id, Product::class, 'down');
    }
}

<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'delete'
    ];

    public $product_id, $parent_id, $image, $icon, $name, $text, $description, $keywords;
    public $is_uploaded = false;

    public function render()
    {
        $products = ProductService::all();

        return view('livewire.admin.product.products', ['products' => $products]);
    }

    public function updatedImage()
    {
        $this->is_uploaded = true;
    }

    public function resetData()
    {
        $this->parent_id = null;
        $this->image = null;
        $this->icon = null;
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

        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->image = $product->image;
        $this->icon = $product->icon;
        $this->name = $product->name;
        $this->text = $product->text;
        $this->description = $product->description;
        $this->keywords = $product->keywords;
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
            'icon' => __('admin.icon'),
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
        ProductService::deleteFiles(Product::class, $id, 'images/products', 'image');
        ProductService::delete(Product::class, $id);
    }

    public function changeColumn($id, $column)
    {
        ProductService::changeColumn(Product::class, $id, $column);
    }

    public function up($id)
    {
        $data = Product::find($id);

        Product::where('parent_id', $data->parent_id)
            ->where('position', $data->position - 1)
            ->update([
                'position' => $data->position,
            ]);

        $data->update([
            'position' => $data->position - 1,
        ]);
    }

    public function down($id)
    {
        $data = Product::find($id);

        Product::where('parent_id', $data->parent_id)
            ->where('position', $data->position + 1)
            ->update([
                'position' => $data->position,
            ]);

        $data->update([
            'position' => $data->position + 1,
        ]);
    }
}

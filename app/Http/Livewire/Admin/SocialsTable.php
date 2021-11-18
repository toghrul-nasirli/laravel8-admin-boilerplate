<?php

namespace App\Http\Livewire\Admin;

use App\Models\Social;
use Illuminate\Support\Facades\DB;
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
        return view('livewire.admin.socials-table', [
            'socials' => Social::search([
                'position',
                'icon',
                'link',
            ], $this->search)
                ->when($this->status != 'all', function ($query) {
                    $query->where('status', $this->status);
                })->orderBy($this->orderBy, $this->orderDirection)
                ->paginate($this->perPage),
            'maxPosition' => Social::max('position'),
        ]);
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
        $social = Social::findOrFail($id);
        Social::where('position', '>', $social->position)->update([
            'position' => DB::raw('position - 1'),
        ]);
        $social->delete();
    }

    public function changeStatus($social_id)
    {
        $social = Social::find($social_id);
        $social->status ? $social->status = false : $social->status = true;
        $social->save();
    }

    public function up($social_id)
    {
        $social = Social::find($social_id);

        if ($social) {
            Social::where('position', $social->position - 1)->update([
                'position' => $social->position,
            ]);
            $social->update([
                'position' => $social->position - 1,
            ]);
        }
    }

    public function down($social_id)
    {
        $social = Social::find($social_id);

        if ($social) {
            Social::where('position', $social->position + 1)->update([
                'position' => $social->position,
            ]);
            $social->update([
                'position' => $social->position + 1,
            ]);
        }
    }
}

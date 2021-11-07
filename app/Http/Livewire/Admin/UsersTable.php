<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
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
    public $is_admin = 'all';

    public function render()
    {
        return view('livewire.admin.users-table', [
            'users' => User::search([
                'id',
                'username',
                'email',
            ], $this->search)
                ->where([['id', '!=', auth()->user()->id], ['id', '!=', 1]])
                ->when($this->is_admin != 'all', function ($query) {
                    $query->where('is_admin', $this->is_admin);
                })->orderBy($this->orderBy, $this->orderDirection)
                ->paginate($this->perPage)
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
        $user = User::findOrFail($id);
        $user->delete();
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Services\UserService;
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
        $users = UserService::all($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->is_admin);

        return view('livewire.admin.users-table', compact('users'));
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
        UserService::delete($id);
    }
}

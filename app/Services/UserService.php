<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function all($search, $is_admin, $orderBy, $orderDirection, $perPage)
    {
        return User::search([
            'id',
            'username',
            'email',
        ], $search)
            ->where([['id', '!=', auth()->user()->id], ['id', '!=', 1]])
            ->when($is_admin != 'all', function ($query) {
                $query->where('is_admin', $this->is_admin);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['password'] = Hash::make($data['password']);

        User::create($data);
    }

    public static function update($user, $data)
    {
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
    }

    public static function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
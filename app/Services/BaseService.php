<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BaseService
{
    public static function delete($id, $model, $path = null)
    {
        $data = $model::findOrFail($id);
    
        if($path !== null) _deleteFile($path, $data->image);
    
        if($data->position) {
            $model::where('position', '>', $data->position)->update([
                'position' => DB::raw('position - 1'),
            ]);
        }
    
        $data->delete();
    }
    
    public static function changeColumn($id, $model, $column)
    {
        $data = $model::find($id);
        $data->$column ? $data->$column = false : $data->$column = true;
        $data->save();
    }

    public static function changePosition($id, $model, $direction)
    {
        $data = $model::find($id);

        if ($data) {
            if ($direction === 'up') {
                $model::where('position', $data->position - 1)->update([
                    'position' => $data->position,
                ]);
                $data->update([
                    'position' => $data->position - 1,
                ]);
            } else if ($direction === 'down') {
                $model::where('position', $data->position + 1)->update([
                    'position' => $data->position,
                ]);
                $data->update([
                    'position' => $data->position + 1,
                ]);
            }
        }
    }
}

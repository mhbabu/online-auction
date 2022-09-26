<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;



if (!function_exists('get_file')) {
    /**
     * get_file
     *
     * @param  string $file
     * @param  string $folder | $url
     * @return url
     */
    function get_file($folder, $file)
    {

        $hasFile = Storage::exists($folder . '/' . $file);
        if ($hasFile)
            return Storage :: url($folder.'/'.$file);
        else
            return 'https://via.placeholder.com/250x250';
    }
}

if (!function_exists('storeImage')) {
    // image store in storage
    function storeImage($folder, $file)
    {
        $fileName = md5($file . microtime()) . '.' . $file->extension();
        $file->storeAs($folder, $fileName);
        return $fileName;
    }
}

if (!function_exists('deleteExistingImage')) {
    // image delete from storage
    function deleteExistingImage($folder, $file)
    {
        if ($file) {
            if (Storage::exists($folder . '/' . $file)) {
                unlink(public_path() . '/' . 'uploads/' . $folder . '/' . $file);
            }
        }
    }
}


if (! function_exists('getSalePercentage'))
{
    function getSalePercentage($previousData=0,$currentData=0)
    {
        if($previousData == $currentData)
          return ['textColor' => 'text-warning','data' => 0,'icon' => ''];
        elseif($previousData)
        {
            $data = round(($currentData-$previousData)*100/$previousData);
            if($data>0)
            return ['textColor' => 'text-success','data' => abs($data),'icon' => 'fas fa-caret-up'];
            else
            return ['textColor' => 'text-danger','data' => abs($data),'icon' => 'fas fa-caret-down'];
        }
        else
        return ['textColor' => 'text-success','data' => 100,'icon' => 'fas fa-caret-up'];

    }
}


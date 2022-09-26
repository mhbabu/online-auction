<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Settings extends Model {

    public static function StorePhoto($referenceType,$referenceId,$file,$dimensions=[300,300]){

        $directory = 'uploads';
        switch ($referenceType) {
            case 'product':
                $directory .= '/product/';
                break;
            case 'slider':
                $directory .= '/slider/';
                break;
            default:
                $directory .= '/default/';
        }



        if($file){
            $fileName = trim(str_replace('.','',uniqid($referenceType."_",true)).'.'.$file->getClientOriginalExtension());

            if(!file_exists($directory)){
                mkdir($directory,0777,true);
                $indexFile = fopen($directory . "/index.html", "w");
                fclose($indexFile);
            }

            // image Width x Height | $dimensions[0] x $dimensions[1]
            $path = $directory.$fileName;
            Image::make($file->getRealPath())->resize($dimensions[0], $dimensions[1], function($constraint){
                $constraint->aspectRatio();
            })->save($path, 100); // quality medium

            $photo = new Photo();
            $photo->reference_id    = $referenceId;
            $photo->reference_type  = $referenceType;
            $photo->directory       = $directory;
            $photo->photo           = $fileName;
            $photo->path            = $directory.$fileName;
            $photo->dimensions      = "$dimensions[0] x $dimensions[1]";
            $photo->status          = 1;
            $photo->save();

            return $fileName;
        }

        return false;
    }

    public static function StoreDocument($referencePath,$file){

        $directory = 'uploads';
        switch ($referencePath) {
            case 'product_document':
                $directory .= '/product_document/';
                break;
            default:
                $directory .= '/default/';
        }



        if($file){
            $fileName = trim(str_replace('.','',uniqid($referencePath."_",true)).'.'.$file->getClientOriginalExtension());

            if(!file_exists($directory)){
                mkdir($directory,0777,true);
                $indexFile = fopen($directory . "/index.html", "w");
                fclose($indexFile);
            }

            $filePath = $directory . $fileName;

            if (move_uploaded_file($file->getPathname(), $filePath)) {
                return $fileName;
            } else {
                return false;
            }
        }

        return false;
    }

}

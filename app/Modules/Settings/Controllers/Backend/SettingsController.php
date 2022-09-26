<?php

namespace App\Modules\Settings\Controllers\Backend;

use App\Libraries\Encryption;
use App\Modules\Settings\Models\Photo;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    /**
     * Delete Photo
     */
    public function deletePhoto($photoId)
    {
        $decodedPhotoId = Encryption::decodeId($photoId);
        $photo = Photo::find($decodedPhotoId);
        $photo->is_archive = 1;
        $photo->status = 0;
        $photo->save();
        session()->put('flash_success', 'Photo deleted successfully!');
    }
}

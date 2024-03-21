<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class FilesService
{
    public function deleteFile($path)
    {
        if (file_exists(public_path() . $path)) {
            File::delete((public_path() . $path));
        }
    }
    public function uploadImg($file)
    {
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }

        $extension = $file->extension();

        $fileName = $file->hasName();
        $splitName = explode('.', $fileName)[0];
        $path = '/upload'.$splitName.'.'.$extension;

        move_uploaded_file($file, public_path().$path);

        return $path;

        
    }
}

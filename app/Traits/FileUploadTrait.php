<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = NULL, $path)
    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};

            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . Str::random(10) . '.' . $ext;

            if ($oldPath) {
                $this->deleteFile($oldPath);
            }

            $url = Storage::disk('s3')->putFileAs($path, $image, $imageName, 'public');
            $imgUrl = Storage::disk('s3')->url($url);

            return $imgUrl;
        }

        return NULL;
    }

    function uploadVideo(Request $request, $inputName, $oldPath = NULL, $path)
    {
        if ($request->hasFile($inputName)) {

            $video = $request->{$inputName};

            $ext = $video->getClientOriginalExtension();
            $videoName = 'media_' . Str::random(10) . '.' . $ext;

            $url = Storage::disk('s3')->putFileAs($path, $video, $videoName, 'public');
            $videoUrl = Storage::disk('s3')->url($url);

            return $videoUrl;
        }

        return NULL;
    }

    function uploadFileAttachment(Request $request, $inputName, $oldPath = NULL, $path)
    {
        if ($request->hasFile($inputName)) {

            $file = $request->{$inputName};

            $ext = $file->getClientOriginalExtension();
            $fileName = 'file_' . Str::random(10) . '.' . $ext;

            if ($oldPath) {
                $this->deleteFile($oldPath);
            }

            $url = Storage::disk('s3')->putFileAs($path, $file, $fileName, 'public');
            $fileUrl = Storage::disk('s3')->url($url);

            return $fileUrl;
        }

        return NULL;
    }

    function deleteFile($path)
    {
        // unlink($path);
        Storage::disk('s3')->delete($path);
    }
}
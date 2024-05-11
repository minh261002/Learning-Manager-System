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

            $localPath = tempnam(sys_get_temp_dir(), 'getID3');
            file_put_contents($localPath, file_get_contents($videoUrl));

            $videoDuration = getVideoDuration($localPath);

            unlink($localPath);

            return
                [
                    'url' => $videoUrl,
                    'duration' => $videoDuration
                ];
        }

        return NULL;
    }

    function deleteFile($path)
    {
        if (Storage::disk('s3')->exists($path)) {
            // unlink($path);
            Storage::disk('s3')->delete($path);
        }
    }
}
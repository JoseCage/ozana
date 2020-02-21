<?php

namespace WatchLater\Services;

class UploadService
{

    public function handleImageUpload($image)
    {
        $if(!is_null($image)) {
            $image->move(public_path('events') .'temp');
        }
    }

}

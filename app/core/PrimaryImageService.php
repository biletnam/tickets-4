<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 9/1/15
 * Time: 12:09 PM
 */

namespace App\Core;


use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PrimaryImageService
{

    public function CreateImage($currentImage)
    {


        $fileName = $currentImage->getClientOriginalName();

        $fileName = rand(0, 10000) . '' . e($fileName);

        $realPath = $currentImage->getRealPath();

        dd($realPath);


        Image::make($realPath)->resize('300','300')->insert(public_path('images/uploads/thumbnail/' . $fileName));

        return $fileName;

    }

}
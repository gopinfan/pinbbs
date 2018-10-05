<?php
/**
 * Created by PhpStorm.
 * User: zhangrui
 * Date: 2018/10/5
 * Time: 22:32
 */

namespace App\Handlers;


use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    protected $allowedExt = ['png','jpg','gif','jpeg'];

    // 保存图片
    public function save($file, $folder, $prefix, $maxWidth=false)
    {
        $folderName = 'uploads/images/'.$folder.'/'.date('Ym/d');
        $uploadPath = public_path().'/'.$folderName;
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $filename = sprintf('%s_%s_%s.%s', $prefix, time(), str_random(10), $extension);
        if (!in_array($extension, $this->allowedExt)){
            return false;
        }

        $file->move($uploadPath, $filename);

        if ($maxWidth && $extension!= 'gif'){
            $this->reduceSize($uploadPath.'/'.$filename, $maxWidth);
        }

        return [
            'path' => config('app.url').'/'.$folderName.'/'.$filename
        ];
    }

    //
    public function reduceSize($filePath, $maxWidth)
    {
        $image = Image::make($filePath);

        $image->resize($maxWidth, null, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save();
    }
}
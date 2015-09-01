<?php

namespace J4\Upload;

use \Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class J4Image{
    protected $images;

    protected $watermark;

    protected $savepath;

    public function __construct($watermark = null){
        $this->setWaterMark($watermark);
    }

    public function setWaterMark($path = null){
        $path = $path ? $path: config('j4.waterMark');
        $this->watermark = Image::make($path);
        return $this;
    }

    public function setSavePath($filename = null, $reset = true){
        if(!$reset){
            $this->savepath = public_path($filename);
            return $this;
        }
        $randstr = strtolower(str_random(7));
        $newFileName = $randstr.time();
        $index = (int) strripos(trim($filename, '/'), '/');
        if($index == 0){
            $this->savepath = public_path($newFileName);
        }else{
            $path = substr($filename, 0, $index + 1);
            $this->savepath = public_path($path.$newFileName);
        }
        return $this;
    }

    public function upload($files, $path, $reset = true, $addwatermark = true){
        $result = [];
        if($files instanceof UploadedFile){
            array_push($this->images, $files);
        }else{
            $this->images = $files;
        }
        foreach($this->images as $image){
            $ext = $image->getClientOriginalExtension();
            $size = $image->getClientSize();
            if(!in_array($ext, config('j4.allowImageType'))){
                $result['status'] = 'failed';
                $result['msg'] = 'invalid format';
                return $result;
            }
            if($size > config('j4.maxImageSize')){
                $result['status'] = 'failed';
                $result['msg'] = 'invalid size';
                return $result;
            }
        }

        $path = trim($path, '/');
        $path = $path? $path.'/': 'images/';
        $dbimage = [];
        $cache = [];
        $num = 0;
        foreach ($this->images as $image) {
            $name = $image->getClientOriginalName();
            try {
                $image = Image::make($image);
                $image = $addwatermark ? $this->addWaterMark($image, $this->watermark) : $image;
                $this->setSavePath($path.$name, $reset);
                $image->save($this->savepath);
                array_push($cache, $image);
                array_push($dbimage, substr($this->savepath, strrpos($this->savepath, $path)));
                $result['status'] = 'success';
                $result['msg'] = 'success';
            }catch (Exception $err) {
                $result['status'] = 'failed';
                $result['msg'] = $err->getMessage();
                // rollback
                if(count($cache) > 0){
                    foreach($cache as $i){
                        $i->destroy();
                    }
                }
                $dbimage = [];
                break;
            }
            $num++;
        }
        $result['image'] = $dbimage;
        return $result;
    }

    public function addWaterMark($image, $watermark){
        return $image->insert($watermark, 'bottom-right', 8, 8);
    }
}
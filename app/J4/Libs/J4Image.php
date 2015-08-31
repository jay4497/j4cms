<?php

namespace J4\Libs;

use \Image;
use \Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class J4Image{
    protected $images;

    protected $watermark;

    protected $savepath;

    public function __construct($watermark = null){
        $this->setWaterMark($watermark);
        return $this;
    }

    public function setWaterMark($path){
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
        $this->images = $files;
        if($files instanceof UploadedFile){
            array_push($this->images, $files);
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
        return json_encode($result);
    }

    public function addWaterMark($image, $watermark){
        return $image->insert($watermark, 'bottom-right', 8, 8);
    }
}
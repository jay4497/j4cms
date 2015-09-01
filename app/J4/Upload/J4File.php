<?php

namespace J4\Upload;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class J4File {
    protected $files = [];

    protected $result = [];

    public function upload($files, $path, $reset = true){
        if(is_array($files)){
            $this->files = $files;
        }else{
            array_push($this->files, $files);
        }

        foreach($this->files as $file){
            $ext = $file->getClientOriginalExtension();
            $size = $file->getClientSize();
            if(!in_array($ext, config('j4.allowFileType'))){
                $this->result['status'] = 'failed';
                $this->result['msg'] = 'invalid format';
                return $this->result;
            }
            if($size > config('j4.maxFileSize')){
                $this->result['status'] = 'failed';
                $this->result['msg'] = 'invalid size';
                return $this->result;
            }


        }
    }
}
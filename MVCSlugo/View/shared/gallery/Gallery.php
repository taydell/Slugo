<?php
/**
 * Created by PhpStorm.
 * User: Isabella
 * Date: 3/19/2015
 * Time: 12:25 PM
 */

class slugoGallery {
    public $path;

    public function __construct()
    {
        $this->path = '../../View/shared/gallery/slugoimagesmedia';
    }

    public function setPath ($path)
    {

       $this->path = $path;
    }

    private function getDirectory($path)
    {
        return scandir($path);
    }

    public function getImages($extensions = array('jpg','png'))
    {
        $images = $this->getDirectory($this->path);

        foreach($images as $index => $image)
        {

            $test=explode('.', $image);
            $extension = strtolower(end($test));
            if(!in_array($extension, $extensions)) {
                unset($images[$index]);
            } else {
                $folder[$index] = array(
                    'full' => $this->path . '/' . $image,
                );
            }
        }

        return (count($images)) ? $images : false;
    }
}
<?php
interface InterImage {
    public function createImage(Image $i); //criar imagens
    public function finfById($id);
    public function upadeteImage();
    public function deleteImage($id);

}
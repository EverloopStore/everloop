<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
      public $image;

      // Правила проверки типа файла
      public function  rules ()
      {
          return [
              //[['image'], 'required'],
              [['image'], 'file', 'extensions' => 'jpg,png,jpeg']
          ];
      }

      // Метод принимающий файл и текущий файл в статье
      public function uploadFile(UploadedFile $file, $currentImage)
      {
        $this->image = $file;

        if ($this->validate())
        {
            $this->removeCurrentImage($currentImage);
            return $this->saveImage();
        }
      }

      // Получение пути к папке Uploads
      public function getFolder()
      {
          return Yii::getAlias('@web') . 'uploads/';
      }

      // Генерация имени изображения
      public function generateFilename()
      {
          return strtolower((md5(uniqid($this->image->baseName)) . '.' . $this->image->extension));
      }

      // Удаление изображения
      public function removeCurrentImage($currentImage)
      {
          if ($this->imageExists($currentImage))
          {
              unlink($this->getFolder() . $currentImage);
          }
      }

      // Проверка существует ли изображение
      public function imageExists($currentImage)
      {
          if (!empty($currentImage) && $currentImage != null)
          {
              return
                  file_exists($this->getFolder() . $currentImage) &&
                  is_file($this->getFolder() . $currentImage);
          }
      }

      // Сохранение изображения
      public function saveImage()
      {
          $filename = $this->generateFilename();
          $this->image->saveAs($this->getFolder() . $filename);
          return $filename;
      }
}
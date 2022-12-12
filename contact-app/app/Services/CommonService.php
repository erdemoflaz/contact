<?php


namespace App\Services;


class CommonService
{
    public function modelName($record)
    {
        return ['name' => class_basename($record)];
    }
}

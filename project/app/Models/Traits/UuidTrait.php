<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    /**
     * Boot the Uuid trait for the model.
     *
     * @return void
     */
    public static function bootUuidTrait()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }

    /**
     * @return boolean
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}

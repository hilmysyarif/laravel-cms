<?php

namespace App\Traits;

use Flash;
use Route;

trait ResourceableTrait
{
    /**
     * Boot events
     */
    public static function bootResourceableTrait()
    {
        static::created(function ($model){
            if (in_array('admin', Route::current()->getAction()['middleware'])) {
                Flash::success("Запись #{$model->id} сохранена");
            }
        });

        static::updated(function ($model){
            if (in_array('admin', Route::current()->getAction()['middleware'])) {
                Flash::success("Запись #{$model->id} обновлена");
            }
        });

        static::deleted(function ($model){
            if (in_array('admin', Route::current()->getAction()['middleware'])) {
                Flash::success("Запись #{$model->id} удалена");
            }
        });
    }
}

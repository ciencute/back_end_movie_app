<?php

namespace App\Repository;

use App\Models\Slider;

class SliderRepository
{
    public function getAllSlider() {
        return cache()->remember('all-slider', 60*60*24 , function ()  {
            return Slider::all();
        });

    }

}

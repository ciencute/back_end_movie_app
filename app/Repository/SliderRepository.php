<?php

namespace App\Repository;

use App\Models\Slider;

class SliderRepository
{
    public function getAllSlider() {
        return Slider::all();
    }

}

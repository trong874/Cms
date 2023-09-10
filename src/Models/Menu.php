<?php

namespace BytePlatform\Cms\Models;

use BytePlatform\Cms\Traits\WithTranslation;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    use  WithTranslation;
}

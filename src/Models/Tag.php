<?php

namespace BytePlatform\Cms\Models;

use BytePlatform\Cms\Traits\WithComments;
use BytePlatform\Cms\Traits\WithTranslation;
use BytePlatform\Traits\WithSlug;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use WithSlug, WithComments,WithTranslation;
}

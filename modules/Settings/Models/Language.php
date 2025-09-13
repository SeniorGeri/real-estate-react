<?php

declare (strict_types= 1);

namespace Modules\Settings\Models;

use App\Traits\HasTableFilterTrait;
use App\Traits\HasTranslationsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Language extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;
    use HasTranslationsTrait;

    protected $fillable = [
        'language',
        'language_code',
        'flag',
        'description',
    ];

    protected array $translatable = [
        'language',
    ];
}

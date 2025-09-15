<?php

declare(strict_types=1);

namespace Modules\Notification\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Property\Models\Property;
use App\Traits\HasTableFilterTrait;

final class ContactUs extends Model
{
    use SoftDeletes;
    use HasTableFilterTrait;

    protected $fillable = [
        'property_id',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'ip',
        'is_read'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}

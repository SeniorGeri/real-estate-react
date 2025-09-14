<?php

declare(strict_types=1);

namespace Modules\Property\Helpers;

use Modules\Property\Models\PropertyAttribute;
use Modules\Property\Models\Property;

final class PropertyAttributesService
{
    public static function storePropertyAttributes(Property $property, array $attributes): void
    {

        PropertyAttribute::query()
        ->where('property_id', $property->id)
        ->whereNotIn('id', array_column($attributes, 'id'))
        ->forceDelete();

        foreach ($attributes as $attribute) {
            PropertyAttribute::updateOrCreate(['id' => $attribute['id']], [
                'property_id' => $property->id,
                'attribute' => $attribute['attribute'],
                'value' => $attribute['value'],
                'image' => $attribute['image'],
            ]);
        }

    }
}
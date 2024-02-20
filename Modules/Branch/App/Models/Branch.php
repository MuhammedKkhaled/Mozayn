<?php

namespace Modules\Branch\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['branch_name', 'branch_location', 'phone', 'social_media_links'];

    protected $casts = [
        'social_media_links' => 'array',
    ];

    /************************ Mutators And Accessors************************************/
    public function setSocial_media_linksAttribute($value)
    {
        $links = [];

        foreach ($value as $array_item) {
            if (! is_null($array_item['key'])) {
                $links[] = $array_item;
            }
        }

        $this->attributes['social_media_links'] = json_encode($links);
    }
}
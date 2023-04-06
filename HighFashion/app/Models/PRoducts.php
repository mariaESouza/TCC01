<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Products extends Model
{
    use HasFactory;

    public function types(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
        
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id');
        
    }
 
}
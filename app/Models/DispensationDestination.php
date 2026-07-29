<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispensationDestination extends Model
{
    /** @use HasFactory<\Database\Factories\DispensationDestinationFactory> */
    use HasFactory;

    public function dispensations()
    {
        return $this->hasMany(Dispensation::class);
    }
}

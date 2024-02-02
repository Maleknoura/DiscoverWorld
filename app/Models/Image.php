<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'recit_id'];

    public function recit()
    {
        return $this->belongsTo(Recit::class, 'recit_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recit extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'destinationId'];
    public static function getTotalCount()
    {
        return self::count();
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destinationId');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'recit_id');
    }
}

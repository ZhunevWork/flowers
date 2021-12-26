<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'offers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cart',
        'bouquet_id',
        'size_id',
        'count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class, 'bouquet_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

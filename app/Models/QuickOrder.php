<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuickOrder extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'new'       => 'Новый',
        'paid'      => 'Оплачен',
        'delivery'  => 'Доставка',
        'delivered' => 'Доставлен',
        'cancel'    => 'Отменён',
    ];

    public $table = 'quick_orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bouquet_id',
        'quantity',
        'name',
        'phone',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class, 'bouquet_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'delivery_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'sub_total',
        'delivery',
        'discount',
        'promocode_id',
        'total',
        'status_id',
        'payment_id',
        'delivery_data',
        'delivery_time',
        'exact_time',
        'address_id',
        'anonim',
        'recipient',
        'recipient_phone',
        'check_address_recipient',
        'check_time_recipient',
        'photo_with_recipient',
        'postcard',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function promocode()
    {
        return $this->belongsTo(PromoCode::class, 'promocode_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function getDeliveryDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeliveryDataAttribute($value)
    {
        $this->attributes['delivery_data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

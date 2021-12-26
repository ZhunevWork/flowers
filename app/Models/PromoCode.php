<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'summ'    => 'Сумма',
        'percent' => 'Проценты',
    ];

    public $table = 'promo_codes';

    protected $dates = [
        'active_until',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'type',
        'summ',
        'percent',
        'is_active',
        'active_until',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getActiveUntilAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setActiveUntilAttribute($value)
    {
        $this->attributes['active_until'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

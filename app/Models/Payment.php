<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected array $statuses = [
        'done' => ['text' => 'Оплачен', 'class' => 'text-success'],
        'fail' => ['text' => 'Не оплачен', 'class' => 'text-danger'],
        'wait' => ['text' => 'Ожидание оплаты', 'class' => 'text-warning']
    ];

    /**
     * Возвращает трек
     *
     * @return HasOne
     */
    public function beat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Track::class, 'id', 'track_id');
    }

    /**
     * Возвращает статус заказа
     *
     * @return array
     */
    public function getStatus(): array
    {
        return $this->statuses[$this->status];
    }
}

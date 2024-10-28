<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Jobs\MonitorPendingOrder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property OrderStatus $status
 * @property Carbon $created_at
*/

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'price'
        ];


    protected $casts = [
        'status' => OrderStatus::class
    ];


    public function markAsCanceled() : void
    {
        $this->update([
           'status' => OrderStatus::CANCELLED
        ]);MonitorPendingOrder::dispatch($order);
    }


    public function orderThan( int $minutes ) : bool
    {
        return $this->created_at->diffInMinutes(now()) > $minutes;
    }
}

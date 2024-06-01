<?php

namespace Modules\Order\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    protected $fillable = [
        'id', 'user_id', 'user_name', 'address'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function create(): void
    {
        $this->save();
        $this->items()->saveMany($this->items);
    }

    public function addItems(Collection $items): void
    {
        foreach ($items as $item) {
            $this->items->push($item);
        }
    }
}

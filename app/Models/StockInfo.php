<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInfo extends Model
{
    // use HasFactory;
    /**
     * 可以被批量賦值的屬性。
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'stock_info';
    protected $guarded = ['id'];
    protected $fillable = [
        'stock_id',
        'shares',
        'amount',
        'opening_price',
        'closing_price',
        'highest',
        'lowest',
        'diff',
        'volume',
        'date',
    ];
}

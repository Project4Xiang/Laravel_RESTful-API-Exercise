<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockList extends Model
{
    // use HasFactory;
    /**
     * 可以被批量賦值的屬性。
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'stock_list';
    protected $guarded = ['id'];
    protected $fillable = [
        'no',
        'name',
        'date',
    ];
}

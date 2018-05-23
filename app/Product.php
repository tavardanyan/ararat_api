<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'sku',
        'category',
        'file',
        'desc',
        'specific',
        'tags',
        'brend',
        'country',
        'model',
        'material',
        'color',
        'price1',
        'price2',
        'price3',
        'available',
        'count',
        'count_reserve',
        'piece_size',
        'piece_weight',
        'pack_size',
        'pack_weight',
        'box_size',
        'box_weight',
        'count_in_box',
        'count_in_pack'
    ];
}

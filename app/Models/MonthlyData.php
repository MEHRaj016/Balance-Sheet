<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'salary',
        'food_expenses',
        'home_rent',
        'transportation',
        'medicine',
        'total_expenses',
        'remaining_balance',
    ];
}


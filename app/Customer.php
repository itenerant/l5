<?php

namespace App;

use App\Helpers\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use DataViewer;

    public static $columns = [
        'id',
        'name',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];
}

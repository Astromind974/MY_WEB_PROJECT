<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    protected $guarded = [];

    public function getImageURL() {
        if ($this->image) {
            return url('/storage/app'.$this->image);
        }
    }
}

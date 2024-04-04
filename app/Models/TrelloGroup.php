<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrelloGroup extends Model
{
    use HasFactory;

    protected $fillable = ["title", "sort"];

    public function cards()
    {
        return $this->hasMany(TrelloCard::class)->orderBy("sort");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = ['nature_operation', 'date_operation', 'debit', 'category_id', 'status_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ["title", "link", "date", "description", 'type_id'];

    // # Mutator date
    protected function getDateAttribute($value) {
        return date('d/m/Y', strtotime($value));
    }

    // # Mutator img (not working)

    // protected function getImageAttribute($value) {
    //     return $value ? asset('storage/' . $value) : 'https://www.frosinonecalcio.com/wp-content/uploads/bfi_thumb/default-placeholder-38gbdutk2nbrubtodg93tqlizprlhjpd1i4m8gzrsct8ss250.png';
       
    // }

    // # Relations method one to many

    public function type() {
        return $this->belongsTo(Type::class);
    }
        
    // # Relations method many to many
    
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
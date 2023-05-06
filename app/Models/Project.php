<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ["title", "link", "date", "description", 'type_id'];

    // ! EAGER LOADING X QUERY APICONTROLLER (SOSTITUISCE IL WITH)
    // protected $with = ['technologies', 'type'];
    
    // * Getter immagini
    public function getImageUri() {
        return $this->link ? url('storage/' . $this->link) : 'http://127.0.0.1:8000/storage/uploads/projects/upPAzFeKw1Pq3FFGwntXOmZhFzGznUq7baQxf6Zz.jpg';
    }

    // * Mutator date

    protected function getDateAttribute($value) {
        return date('d/m/Y', strtotime($value));
    }


    // * Relations method one to many

    public function type() {
        return $this->belongsTo(Type::class);
    }
        
    // * Relations method many to many
    
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
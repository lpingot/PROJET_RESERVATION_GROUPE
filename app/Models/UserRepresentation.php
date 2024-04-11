<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRepresentation extends Model
{
    use HasFactory;

    protected $table = 'user_representation'; // Spécifiez le nom de votre table si ce n'est pas la convention de nommage standard de Laravel

    protected $fillable = [
        'representation_id',
        'user_id',
        'places',
        'profile_type', // Assurez-vous que ce champ existe dans votre table si vous l'ajoutez ici
        'date'
    ];
       /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // Ici, vous pouvez également ajouter des relations, par exemple :
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function representation() {
        return $this->belongsTo('App\Models\Representation');
    }
}

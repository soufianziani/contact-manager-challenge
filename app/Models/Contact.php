<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'e_mail',
        'telephone_fixe',
        'service',
        'fonction',
        'organisation_id',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }

        $search = "%" . $search . "%";

        return $query->where(fn($query) => $query->where('nom', 'like', $search)
            ->orWhere('prenom', 'like', $search)
            ->orWhereHas('organisation', fn($query) => $query->where('nom', 'like', $search)
            )
        );
    }

    protected function nom(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function prenom(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value),
        );
    }

    protected function nomComplet(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->prenom . ' ' . $this->nom,
        );
    }


    protected function eMail(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
        );
    }
}

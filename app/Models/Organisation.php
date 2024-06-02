<?php

namespace App\Models;

use App\Enums\OrganizationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'code_postal',
        'ville',
        'statut',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    protected function nom(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
        );
    }

    protected function statusColor(): Attribute
    {
        return Attribute::make(
            get: fn() => OrganizationStatus::color($this->statut),
        );
    }
}

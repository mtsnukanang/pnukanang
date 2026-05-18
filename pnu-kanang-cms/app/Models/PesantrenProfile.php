<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesantrenProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'content',
        'image',
    ];

    /**
     * Convenience method: fetch a section content by key.
     */
    public static function section(string $section): ?self
    {
        return self::where('section', $section)->first();
    }
}

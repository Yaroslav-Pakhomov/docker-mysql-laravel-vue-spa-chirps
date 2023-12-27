<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageBoard extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, которые нельзя массово присваивать.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'message_boards';

    public static function AllMessages(): Collection
    {
        return self::query()->orderBy('created_at', 'desc')->get();
    }
}

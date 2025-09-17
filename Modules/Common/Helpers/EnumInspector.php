<?php

namespace Modules\Common\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

// This codes maily UUsed For Database column , Enum values fetch And Count Get
class EnumInspector
{
    public static function getEnumValues(string $table, string $column): array
    {
        return Cache::rememberForever("enum_values_{$table}_{$column}", function () use ($table, $column) {
            $type = DB::selectOne("SHOW COLUMNS FROM {$table} WHERE Field = ?", [$column])->Type;

            if (preg_match('/^enum\((.*)\)$/', $type, $matches)) {
                return array_map(fn($val) => trim($val, "'"), explode(',', $matches[1]));
            }

            return [];
        });
    }

    // Used Places ['packagecontroller' => 'index']
    public static function getEnumCount(string $table, string $column): int
    {
        return count(self::getEnumValues($table, $column));
    }
}

<?php

namespace Modules\KamenTheme\Actions;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingAction
{
    public static function set(string $table, array $request): bool
    {
        DB::beginTransaction();

        try {
            $query = DB::table($table)->first();
            if ($query) {
                $ret = DB::table($table)
                    ->where('id', $query->id)->update(
                        array_merge([
                            'updated_at' => now(),
                            'updated_by' => Auth::id(),
                        ], $request)
                    );

                DB::commit();
                Artisan::call('view:clear');

                return $ret ? true : false;
            }

            $ret = DB::table($table)
                ->insert(
                    array_merge([
                        'created_at' => now(),
                        'created_by' => Auth::id(),
                    ], $request)
                );

            DB::commit();
            Artisan::call('view:clear');

            return $ret ? true : false;
        } catch (\Throwable $th) {
            DB::rollback();

            Log::error('Failed to set toggle config', [
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
            ]);

            return false;
        }
    }

    public static function get(string $table, array $select = ['*']): ?object
    {
        return DB::table($table)->select($select)->first();
    }
}

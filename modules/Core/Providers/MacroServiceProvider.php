<?php

namespace Modules\Core\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Inertia\Response as InertiaResponse;
use Nwidart\Modules\Facades\Module;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerInertia();
        $this->regsisterCommonFields();
        $this->registerSearchWhereLike();
        $this->registerModuleMacro();
        $this->registerRedirectResponse();
    }

    public function registerRedirectResponse()
    {
        RedirectResponse::macro('success', function (string $message) {
            $this->with(['success' => $message]);

            return $this;
        });

        RedirectResponse::macro('error', function (string $message, $context = []) {
            if (! empty($context)) {
                Log::error($message, $context);
            }

            $this->with(['error' => $message]);

            return $this;
        });
    }

    public function registerModuleMacro(): void
    {
        Module::macro('findModuleJson', function (string $module, bool $returnType = false) {
            return json_decode(file_get_contents(Module::getModulePath($module).'module.json'), $returnType);
        });

        Module::macro('getModuleJson', function (bool $returnType = false) {
            return collect(Module::allEnabled())->map(function ($module) use ($returnType) {
                return Module::findModuleJson($module->getName(), $returnType);
            });
        });
    }

    /**
     * Inertia.
     *
     * @return void
     */
    public function registerInertia(): void
    {
        InertiaResponse::macro('title', function ($title) {
            return $this->with('title', $title);
        });
    }

    /**
     * Where like for query database.
     *
     * @return void
     */
    protected function registerSearchWhereLike(): void
    {
        Builder::macro('whereLike', function ($attributes, string|null $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            if (count(explode('.', $attribute)) > 2) :

                                [$relationName_1, $relationName_2, $relationAttribute_1] = explode('.', $attribute);

                                $query->orWhereHas($relationName_1.'.'.$relationName_2, function (Builder $query) use ($relationAttribute_1, $searchTerm) {
                                    $query->where($relationAttribute_1, 'LIKE', "%{$searchTerm}%");
                                }); else :
                                    [$relationName, $relationAttribute] = explode('.', $attribute);

                                    $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                        $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                                    });
                                endif;
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });
    }

    /**
     * Macro common fields for migration.
     *
     * @return void
     */
    protected function regsisterCommonFields(): void
    {
        Blueprint::macro('commonFields', function () {
            $this->timestamps();
            $this->softDeletes();
            $this->foreignUuid('created_by')->nullable();
            $this->foreignUuid('updated_by')->nullable();
            $this->foreignUuid('deleted_by')->nullable();
        });
    }
}

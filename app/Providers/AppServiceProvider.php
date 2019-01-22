<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Language::observe(\App\Observers\LanguageObserver::class);
		\App\Models\Paragraph::observe(\App\Observers\ParagraphObserver::class);
		\App\Models\Translation::observe(\App\Observers\TranslationObserver::class);
		\App\Models\Comment::observe(\App\Observers\CommentObserver::class);
		\App\Models\File::observe(\App\Observers\FileObserver::class);
		\App\Models\Project::observe(\App\Observers\ProjectObserver::class);
		\App\Models\Document::observe(\App\Observers\DocumentObserver::class);

        //
        \Carbon\Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}

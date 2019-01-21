<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Paragraph::class => \App\Policies\ParagraphPolicy::class,
		 \App\Models\Translation::class => \App\Policies\TranslationPolicy::class,
		 \App\Models\Comment::class => \App\Policies\CommentPolicy::class,
		 \App\Models\File::class => \App\Policies\FilePolicy::class,
		 \App\Models\Project::class => \App\Policies\ProjectPolicy::class,
		 \App\Models\Document::class => \App\Policies\DocumentPolicy::class,
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Models\User::class  => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

<?php namespace Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Menu\Entities\Menu;
use Menu\Entities\Menuitem;
use Menu\Repositories\Eloquent\EloquentMenuItemRepository;
use Menu\Repositories\Eloquent\EloquentMenuRepository;

class MenuServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function () {
            $this->registerBindings();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    /**
     * Register class binding
     */
    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Menu\Repositories\MenuRepository',
            function() {
                return new EloquentMenuRepository(new Menu);
            }
        );
        $this->app->bind(
            'Modules\Menu\Repositories\MenuItemRepository',
            function() {
                return new EloquentMenuItemRepository(new Menuitem);
            }
        );
    }

}

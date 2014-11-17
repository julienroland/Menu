<?php namespace Menu\Repositories\Eloquent;

use Core\Internationalisation\Helper;
use Core\Repositories\Eloquent\EloquentBaseRepository;
use Menu\Entities\Menu;
use Menu\Repositories\MenuRepository;

class EloquentMenuRepository extends EloquentBaseRepository implements MenuRepository
{
    public function create($data)
    {
        $menu = new Menu;
        $menu->name = $data['name'];

        unset($data['name']);
        $translatableData = Helper::separateLanguages($data);
        Helper::updateTranslated($menu, $translatableData);

        return $menu;
    }

    public function update($menu, $data)
    {
        $translatableData = Helper::separateLanguages($data);

        Helper::updateTranslated($menu, $translatableData);

        return $menu;
    }
}

<?php namespace Menu\Repositories\Eloquent;

use Core\Internationalisation\Helper;
use Core\Repositories\Eloquent\EloquentBaseRepository;
use Menu\Entities\Menuitem;
use Menu\Repositories\MenuItemRepository;

class EloquentMenuItemRepository extends EloquentBaseRepository implements MenuItemRepository
{
    public function create($data)
    {
        $menuItem = new Menuitem;
        $menuItem->menu_id = $data['menu_id'];
        $menuItem->page_id = $data['page_id'];
        $menuItem->target = $data['target'];
        $menuItem->module_name = $data['module'];

        $translatableData = Helper::separateLanguages($data);
        Helper::updateTranslated($menuItem, $translatableData);

        return $menuItem;
    }

    public function update($menuItem, $data)
    {
        $menuItem->menu_id = $data['menu_id'];
        $menuItem->page_id = $data['page_id'];
        $menuItem->target = $data['target'];
        $menuItem->module_name = $data['module'];

        $translatableData = Helper::separateLanguages($data);
        Helper::updateTranslated($menuItem, $translatableData);

        return $menuItem;
    }
}

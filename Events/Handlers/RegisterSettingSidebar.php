<?php

namespace Modules\Setting\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;
use Modules\User\Contracts\Authentication;

class RegisterSettingSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('workshop::workshop.title'), function (Group $group) {
            $group->item(trans('setting::settings.title.settings'), function (Item $item) {
                $item->icon('fa fa-cog');
                $item->weight(50);
                $item->route('admin.setting.settings.index');
                $item->authorize(
                    $this->auth->hasAccess('setting.settings.index')
                );
            });
        });

        return $menu;
    }
}

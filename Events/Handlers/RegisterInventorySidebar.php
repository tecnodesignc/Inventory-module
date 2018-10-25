<?php

namespace Modules\Inventory\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterInventorySidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('inventory::inventaries.title.inventaries'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('inventory::products.title.products'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventory.product.create');
                    $item->route('admin.inventory.product.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventory.products.index')
                    );
                });
                $item->item(trans('inventory::accounts.title.accounts'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventory.account.create');
                    $item->route('admin.inventory.account.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventory.accounts.index')
                    );
                });
                $item->item(trans('inventory::transactions.title.transactions'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventory.transaction.create');
                    $item->route('admin.inventory.transaction.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventory.transactions.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}

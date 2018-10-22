<?php

namespace Modules\Inventary\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterInventarySidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('inventary::inventaries.title.inventaries'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('inventary::products.title.products'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventary.product.create');
                    $item->route('admin.inventary.product.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventary.products.index')
                    );
                });
                $item->item(trans('inventary::accounts.title.accounts'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventary.account.create');
                    $item->route('admin.inventary.account.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventary.accounts.index')
                    );
                });
                $item->item(trans('inventary::transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[cs.title.transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[cs'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventary.transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c.create');
                    $item->route('admin.inventary.transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventary.transaction[d[d[d[d[d[d[d[d[d[d[d[d[d[c[c[t[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[c[cs.index')
                    );
                });
                $item->item(trans('inventary::transations.title.transations'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.inventary.transation.create');
                    $item->route('admin.inventary.transation.index');
                    $item->authorize(
                        $this->auth->hasAccess('inventary.transations.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('shop_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/quick-orders*") ? "c-show" : "" }} {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/payments*") ? "c-show" : "" }} {{ request()->is("admin/bouquets*") ? "c-show" : "" }} {{ request()->is("admin/bouquet-categories*") ? "c-show" : "" }} {{ request()->is("admin/elements*") ? "c-show" : "" }} {{ request()->is("admin/element-categories*") ? "c-show" : "" }} {{ request()->is("admin/sizes*") ? "c-show" : "" }} {{ request()->is("admin/colors*") ? "c-show" : "" }} {{ request()->is("admin/events*") ? "c-show" : "" }} {{ request()->is("admin/promo-codes*") ? "c-show" : "" }} {{ request()->is("admin/delivery-periods*") ? "c-show" : "" }} {{ request()->is("admin/order-statuses*") ? "c-show" : "" }} {{ request()->is("admin/offers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cart-arrow-down c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.shop.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('quick_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.quick-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quick-orders") || request()->is("admin/quick-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-marker c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.quickOrder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-arrow-down c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.payment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('bouquet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bouquets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bouquets") || request()->is("admin/bouquets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-box-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bouquet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('bouquet_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bouquet-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bouquet-categories") || request()->is("admin/bouquet-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bouquetCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('element_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.elements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/elements") || request()->is("admin/elements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-elementor c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.element.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('element_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.element-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/element-categories") || request()->is("admin/element-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.elementCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('size_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sizes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sizes") || request()->is("admin/sizes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.size.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('color_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.colors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/colors") || request()->is("admin/colors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-palette c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.color.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.event.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('promo_code_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.promo-codes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/promo-codes") || request()->is("admin/promo-codes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.promoCode.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('delivery_period_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.delivery-periods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delivery-periods") || request()->is("admin/delivery-periods/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.deliveryPeriod.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-statuses") || request()->is("admin/order-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('offer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.offers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.offer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/user-events*") ? "c-show" : "" }} {{ request()->is("admin/bonus*") ? "c-show" : "" }} {{ request()->is("admin/addresses*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-events") || request()->is("admin/user-events/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userEvent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('bonu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bonus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bonus") || request()->is("admin/bonus/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bonu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/addresses") || request()->is("admin/addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.address.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @can('city_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.city.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
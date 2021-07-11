

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/">
                <span class="logo-text hide-on-med-and-down">Daily Shop </span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>


    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

                <x-admin.navigation
                    names='User'
                    link='admin.user'
                    icon="accessibility"
                    activeClass="{{ request()->routeIs('admin.user') || request()->routeIs('admin.user.*') ? 'active' : '' }}"
                />
                <x-admin.navigation
                    names='Driver'
                    link='admin.driver.index'
                    icon="directions_car"
                    activeClass="{{ request()->routeIs('admin.driver.*') ? 'active' : '' }}"
                />
                    <x-admin.navigation
                        names='Category'
                        link='admin.category'
                        icon="category"
                        activeClass="{{ request()->routeIs('admin.category') || request()->routeIs('admin.category.*') ? 'active' : '' }}"
                    />
                    <x-admin.navigation
                        names='Brand'
                        link='admin.brands.index'
                        icon="branding_watermark"
                        activeClass="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}"
                    />
                    <x-admin.navigation
                        names='Unit'
                        link='admin.unit'
                        icon="line_weight"
                        activeClass="{{ request()->routeIs('admin.unit.*') ? 'active' : '' }}"
                    />
                    <x-admin.navigation
                        names='Vehicle Type'
                        link='admin.vehicle-type'
                        icon="library_books"
                        activeClass="{{ request()->routeIs('admin.vehicle-type') || request()->routeIs('admin.vehicle-type.*') ? 'active' : '' }}"
                    />

                    <x-admin.navigation
                        names='Vehicle'
                        link='admin.vehicle'
                        icon="directions_bus"
                        activeClass="{{ request()->routeIs('admin.vehicle') || request()->routeIs('admin.vehicle.*') ? 'active' : '' }}"
                    />
                <x-admin.navigation
                    names='Location'
                    link='admin.location'
                    icon="add_location"
                    activeClass="{{ request()->routeIs('admin.location') ||  request()->routeIs('admin.location.*') ? 'active' : '' }}"
                />
                  <x-admin.navigation
                    names='Product'
                    link='admin.product.index'
                    icon="add_product"
                    activeClass="{{ request()->routeIs('admin.product.*') ? 'active' : '' }}"
                />
                <x-admin.navigation
                    names='Inventory'
                    link='admin.inventory'
                    icon="inventory"
                    activeClass="{{ request()->routeIs('admin.inventory') ? 'active' : '' }}"
                />
                <x-admin.navigation
                    names='Order'
                    link='admin.order.index'
                    icon="shopping_cart"
                    activeClass="{{ request()->routeIs('admin.order.*') ? 'active' : '' }}"
                />
                <x-admin.navigation
                    names='Subscription'
                    link='admin.subscription.index'
                    icon="shopping_cart"
                    activeClass="{{ request()->routeIs('admin.subscription.*') ? 'active' : '' }}"
                />
                <x-admin.navigation
                    names='Advertisement'
                    link='admin.advertisement.index'
                    icon="shopping_cart"
                    activeClass="{{ request()->routeIs('admin.advertisement.*') ? 'active' : '' }}"
                />
{{--        --}}
    </ul>
</aside>

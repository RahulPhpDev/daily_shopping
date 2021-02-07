

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/">
                <span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>


    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

                    <x-admin.navigation
                        names='user'
                        link='admin.user'
                        icon="accessibility"
                    />
                    <x-admin.navigation
                        names='brand'
                        link='admin.brands.index'
                        icon="branding_watermark"
                    />
                    <x-admin.navigation
                        names='category'
                        link='admin.category'
                        icon="category"
                    />
                    <x-admin.navigation
                        names='Vehicle Type'
                        link='admin.vehicle-type'
                        icon="library_books"
                    />

                    <x-admin.navigation
                        names='Vehicle'
                        link='admin.vehicle'
                        icon="directions_bus"
                    />
                <x-admin.navigation
                    names='Location'
                    link='admin.location'
                    icon="add_location"
                />
                <x-admin.navigation
                    names='Unit'
                    link='admin.unit'
                    icon="unit"
                />
                  <x-admin.navigation
                    names='Product'
                    link='admin.product.index'
                    icon="add_product"
                />
                <x-admin.navigation
                    names='Inventory'
                    link='admin.inventory'
                    icon="inventory"
                />

    </ul>
</aside>
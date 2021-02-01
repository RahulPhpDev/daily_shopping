

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/">
                <span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>


    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">



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
                        names='vehicle'
                        link='admin.vehicle'
                        icon="directions_bus"
                    />
{{--                    <x-admin.navigation--}}
{{--                        names='location'--}}
{{--                        link='admin.location.index'--}}
{{--                        icon="location"--}}

    </ul>
</aside>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {{--Dashboard Sidebar--}}
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--Categories Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Categories
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createCategory') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Category</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showCategories') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showFeaturedCategory') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Featured Category</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Categories Side --}}

        {{-- Brand Side --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    Brands
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">

                <li class="nav-item">
                    <a href="{{ route('createBrand') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Brand</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showBrands') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Brands</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Products
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">

                <li class="nav-item">
                    <a href="{{ route('createProduct') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Product</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showProducts') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Products</p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- End Products Side --}}

        {{--Roles Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Roles
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createRole') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Role</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showRoles') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Roles</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Roles Side --}}

        {{--Users Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createRole') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showUsers') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Users</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Users Side --}}

        {{--Property Groups Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Property Gropus
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createPropertyGroup') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Property Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showPropertyGroups') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Property Groups</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Property Groups Side --}}

        {{--Properties Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Properties
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createProperty') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Property</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showProperties') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Properties</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Properties Side --}}

        {{--Sliders Sidebar--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Sliders
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createSlide') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Slide</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showSliders') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Slides</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Sliders Side --}}

        {{--Sliders Offers--}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Offers
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('createOffer') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Offer</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showOffers') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Offers</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- End Offers Side --}}



        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn-outline-danger" type="submit">Logout</button>
        </form>
    </ul>
</nav>

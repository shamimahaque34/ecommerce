<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}assets/images/e-commerce-logo.png" alt="logo" height="60">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('/')}}assets/images/e-com-logo-sm.png" alt="small logo" height="60">
                    </span>
    </a>

    <!-- Logo Dark -->
    <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}assets/images/logo-dark.png" alt="dark logo" height="22">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('/')}}assets/images/logo-dark-sm.png" alt="small logo" height="22">
                    </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </button>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>


        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                   aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge bg-success float-end">5</span>
                    <span> Dashboards </span>
                </a>
                <a data-bs-toggle="collapse" href="#category" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Category Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="category">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.category')}}">Add Category</a>
                        </li>
                        <li>
                            <a href="{{route('manage.category')}}">Manage Category</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#subCategory" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Sub Category Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="subCategory">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.sub.category')}}">Add Sub Category</a>
                        </li>
                        <li>
                            <a href="{{route('manage.sub.category')}}">Manage Sub Category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#childCategory" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Child Category Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="childCategory">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.child.category')}}">Add Child Category</a>
                        </li>
                        <li>
                            <a href="{{route('manage.child.category')}}">Manage Child Category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#brandModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Brand Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="brandModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.brand')}}">Add Brand</a>
                        </li>
                        <li>
                            <a href="{{route(('manage.brand'))}}">Manage Brand</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#unitModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Unit Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="unitModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.unit')}}">Add Unit</a>
                        </li>
                        <li>
                            <a href="{{route('manage.unit')}}">Manage Unit</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#colorModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Color Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="colorModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.color')}}">Add Color</a>
                        </li>
                        <li>
                            <a href="{{route('manage.color')}}">Manage Color</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sizeModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Size Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sizeModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.size')}}">Add Size</a>
                        </li>
                        <li>
                            <a href="{{route('manage.size')}}">Manage Size</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#productModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Product Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="productModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('add.product')}}">Add Regular Product</a>
                        </li>
                        <li>
                            <a href="{{route('manage.product')}}">Manage Regular Product</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">Add Offer Product</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Manage Offer Product</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">Add Group Product</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Manage Group Product</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#orderModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Order Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="orderModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Manage Order</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Manage Order Return</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Custom Order</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#inventoryModule" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>Inventory Module</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="inventoryModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">New Inventory</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Manage Inventory</a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>


        <!--- End Sidemenu -->


        <div class="clearfix"></div>
    </div>
</div>

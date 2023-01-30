<div class="sidebar close">
    <div class="logo-details">
        <i class="material-icons">cloud</i>
        <span class="logo_name">M I E</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
                <i class="material-icons">
                    dashboard
                </i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('general-setting.index')}}">
                    <i class='material-icons'>setting</i>
                    <span class="link_name">General setting</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('general-setting.index')}}">General setting</a></li>
                <li><a href="{{route('treasure.create')}}">Create</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('treasure.index')}}">
                    <i class='material-icons'>account_balance</i>
                    <span class="link_name">Treasure</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('treasure.index')}}">Treasure</a></li>
                <li><a href="{{route('treasure.create')}}">Create</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="{{route('invoice-type.index')}}">
                    <i class='material-icons'>account_balance</i>
                    <span class="link_name">Invoice Type</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('invoice-type.index')}}">Invoice Type</a></li>
                <li><a href="{{route('invoice-type.create')}}">Create</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="{{route('store.index')}}">
                    <i class='material-icons'>store</i>
                    <span class="link_name">Store</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('store.index')}}">Store</a></li>
                <li><a href="{{route('store.create')}}">Create</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('category.index')}}">
                    <i class='material-icons'>category</i>
                    <span class="link_name">Category</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('category.index')}}">Category</a></li>
                <li><a href="{{route('category.create')}}">Create</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="{{route('unit.index')}}">
                    <i class='material-icons'>straighten</i>
                    <span class="link_name">Unit</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('unit.index')}}">Unit</a></li>
                <li><a href="{{route('unit.create')}}">Create</a></li>
            </ul>
        </li>
        <li>

            <div class="icon-link">
                <a href="{{route('item.index')}}">
                    <i class="material-icons">production_quantity_limits
                    </i>
                    <span class="link_name">Item</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('item.index')}}">Item</a></li>
                <li><a href="{{route('item.create')}}">Create</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="{{route('account-type.index')}}">
                    <i class="material-icons">production_quantity_limits</i>
                    <span class="link_name">Account type</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('account-type.index')}}">Account type</a></li>
                <li><a href="{{route('account-type.create')}}">Create</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('account.index')}}">
                    <i class="material-icons">production_quantity_limits</i>
                    <span class="link_name">Account</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('account.index')}}">Account</a></li>
                <li><a href="{{route('account.create')}}">Create</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('supplier-category.index')}}">
                    <i class="material-icons">production_quantity_limits</i>
                    <span class="link_name">Supplier category</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('supplier-category.index')}}">Supplier category</a></li>
                <li><a href="{{route('supplier-category.create')}}">Create</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{route('customer.index')}}">
                    <i class="material-icons">person</i>
                    <span class="link_name">Customer</span>
                </a>
                <i class="material-icons arrow">expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{route('customer.index')}}">Customer</a></li>
                <li><a href="{{route('customer.create')}}">Create</a></li>
            </ul>
        </li>
    </ul>
</div>

<section class="d-flex py-2 justify-content-between align-items-baseline" id="breadcrumb">
    <h3>@yield('title','Home')</h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @isset($breadcrumbs)
                @foreach($breadcrumbs as $breadcrumb)
                    <li
                        class="breadcrumb-item {{ isset($breadcrumb['active']) && $breadcrumb['active'] === true ? 'active' : '' }}">
                        @if (isset($breadcrumb['link']) && isset($breadcrumb['name']))
                            <a href="{{ url($breadcrumb['link']) }}">{{ ucfirst($breadcrumb['name']) }}</a>
                        @endif
                    </li>
                @endforeach
            @endisset
        </ol>
    </nav>
</section>


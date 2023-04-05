<nav class="navbar navbar-expand-md navbar-dark bg-primary" aria-label="navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="https://tmcars.info/assets/logoV5-3c6d5d6233ec99725cbfc24d0c20ceee.png" alt="w" class="col-9"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('app.categories')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown02">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('category.show', $category->slug) }}">
                                    {{ $category->getName() }}
                                    <span class="badge text-bg-info bg-opacity-10">{{ $category->products_count }}</span>
                                    <span class="badge text-bg-warning bg-opacity-10">{{ $category->out_of_stock_products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-plus-circle"></i> @lang('app.add')
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('product.create') }}">
                                    @lang('app.product')
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                @auth('customer_web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                            <i class="bi-box-arrow-right"></i> {{ auth('customer_web')->user()->name }}
                        </a>
                    </li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('verification') }}">
                            <i class="bi-box-arrow-in-right"></i> @lang('app.login')
                        </a>
                    </li>
                @endauth
                @foreach($locales as $locale)
                    @if(app()->getLocale() != $locale)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('language', $locale) }}">
                                <img src="{{ asset('img/flag/' . $locale . '.png') }}" alt="{{ $locale }}" style="height:1rem;">
                            </a>
                        </li>
                    @endif
                @endforeach()
            </ul>
        </div>
    </div>
</nav>
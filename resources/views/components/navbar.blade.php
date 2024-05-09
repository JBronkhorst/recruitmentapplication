<nav class="navbar navbar-expand-sm bg-light justify-content-center mb-10">
    <ul class="navbar-nav text">
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/home">Home</a>
            </button>
        </li>
        @auth
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/profiles/{{ auth()->user()->id }}">Profile</a>
            </button>
        </li>
        @endauth
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" href="/search">Search</a>
            </button>
        </li>
        @if(auth()->user()->is_admin)
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/candidates">Search candidates</a>
                </button>
            </li>
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/users">User management</a>
                </button>
            </li>
            <li class="nav-item">
                <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                    <a class="nav-link text-white w-max" href="/vacancies">Vacancy management</a>
                </button>
            </li>
        @endif
        @auth
        <li class="nav-item">
            <button class="bg-gray-400 hover:bg-gray-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                <a class="nav-link text-white w-max" {{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Log out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </button>
        </li>
        @endauth
    </ul>
</nav>
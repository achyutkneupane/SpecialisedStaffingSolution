<div>
    <div class="bg-white fixed h-full lg:w-64 w-20 shadow ease-in-out duration-700 overflow-y-auto">
        <div class="text-3xl text-gray-800 bg-white p-3 text-center uppercase sticky top-0">
            @php
                $words = explode(" ", config('app.name', 'Laravel') );
                $initials = null;
                foreach ($words as $w) {
                    $initials .= $w[0];
                }
                echo(strtoupper($initials));
            @endphp
        </div>
        <div class="flex flex-col mt-3">
            <a class="nav-link{{ request()->routeIs('home') ? "-active" : '' }}" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="hidden lg:block">
                    Dashboard
                </span>
            </a>
            @isCustomer
            <a class="nav-link{{ request()->routeIs('scheduleJob') ? "-active" : '' }}" href="{{ route('scheduleJob') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="hidden lg:block">
                    Book A Job
                  </span>
            </a>
            @endisCustomer
            <a class="nav-link{{ request()->routeIs('profile') ? "-active" : '' }}" href="{{ route('profile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="hidden lg:block">
                    Profile
                  </span>
            </a>
            <a class="nav-link{{ request()->routeIs('setting') ? "-active" : '' }}" href="{{ route('setting') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                  </svg>
                  <span class="hidden lg:block">
                    Settings
                  </span>
            </a>

            <a class="nav-link lg:bg-gray-900 lg:text-white lg:hover:bg-gray-700 lg:hover:text-gray-200 lg:mx-10 lg:justify-center lg:rounded-xl lg:mt-4" href="{{ route('logout') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  <span class="hidden lg:block">
                    Logout
                  </span>
            </a>
        </div>
    </div>
</div>

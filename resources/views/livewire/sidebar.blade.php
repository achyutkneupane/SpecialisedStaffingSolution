<div>
    <div class="fixed w-20 h-full overflow-y-auto duration-700 ease-in-out bg-white shadow lg:w-64">
        <div class="sticky top-0 p-3 text-3xl text-center text-blue-800 uppercase bg-white">
          <div class="flex justify-center w-full">
            <img src="{{ asset('statics/logo.png') }}" class="w-1/3">
          </div>
            @php
                $words = explode(" ", config('app.name', 'Laravel') );
                $initials = null;
                foreach ($words as $w) {
                    $initials .= $w[0];
                }
                echo(strtoupper($initials));
            @endphp
        </div>
        <div class="px-5 py-1 mx-4 text-xl text-center bg-blue-100 border border-black rounded-xl">
          {{ auth()->user()->name }}
        </div>
        <div class="flex flex-col mt-3">
            <a class="nav-link{{ request()->routeIs('home') ? "-active" : '' }}" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="hidden lg:block">
                    Dashboard
                </span>
            </a>
            @isManager
            <a class="nav-link{{ request()->routeIs('allEmployee') ? "-active" : '' }}" href="{{ route('allEmployee') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
                <span class="hidden lg:block">
                    Employees
                </span>
            </a>
            <a class="nav-link{{ request()->routeIs('allCustomer') ? "-active" : '' }}" href="{{ route('allCustomer') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
                <span class="hidden lg:block">
                    Customers
                </span>
            </a>
            @endisManager
            @isCustomerOrManager
            <a class="nav-link{{ request()->routeIs('scheduleJob') ? "-active" : '' }}" href="{{ route('scheduleJob') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="hidden lg:block">
                    Book A Job
                  </span>
            </a>
            @endisCustomerOrManager
            <a class="nav-link{{ request()->routeIs('allJobs') ? "-active" : '' }}" href="{{ route('allJobs') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
              </svg>
                  <span class="hidden lg:block">
                    View all Jobs
                  </span>
            </a>
            <a class="nav-link{{ request()->routeIs('allInvoices') ? "-active" : '' }}" href="{{ route('allInvoices') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
              </svg>
                  <span class="hidden lg:block">
                    View all Invoices
                  </span>
            </a>
            <a class="nav-link{{ request()->routeIs('profile') ? "-active" : '' }}" href="{{ route('profile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="hidden lg:block">
                    Profile
                  </span>
            </a>
            <a class="nav-link{{ request()->routeIs('notification') ? "-active" : '' }}" href="{{ route('notification') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                  </svg>
                  <span class="hidden lg:block">
                    Notification @if(auth()->user()->unreadNotifications->count() > 0)<div class="inline px-3 py-2 text-white bg-green-700 rounded-full">{{ auth()->user()->unreadNotifications->count() }}</div>@endif
                  </span>
            </a>
            <a class="nav-link{{ request()->routeIs('setting') ? "-active" : '' }}" href="{{ route('setting') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                  </svg>
                  <span class="hidden lg:block">
                    Settings
                  </span>
            </a>

            <a class="nav-link lg:bg-blue-900 lg:text-white lg:hover:bg-blue-700 lg:hover:text-white lg:mx-10 lg:justify-center lg:rounded-xl lg:mt-4" href="{{ route('logout') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  <span class="hidden lg:block">
                    Logout
                  </span>
            </a>
        </div>
    </div>
</div>

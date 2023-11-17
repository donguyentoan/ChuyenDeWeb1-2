<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>K-WD Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="build/css/tailwind.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>K-WD Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="build/css/tailwind.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>


  <div class="div flex">



    <div class="w-1/5">
      @include('Component.SideBar')
    </div>
    <div class="flex-1 h-full overflow-x-hidden  bg-[#f3f4f6] overflow-y-auto">
          <!-- Navbar -->
          <header class="relative bg-white dark:bg-darker">
            <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
              <!-- Mobile menu button -->
              <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                <span class="sr-only">Open main manu</span>
                <span aria-hidden="true">
                  <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                  </svg>
                </span>
              </button>

              <!-- Brand -->
              <a href="index.html" class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
                Pizza Store
              </a>

              <!-- Mobile sub menu button -->
              <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                <span class="sr-only">Open sub manu</span>
                <span aria-hidden="true">
                  <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                  </svg>
                </span>
              </button>

              <!-- Desktop Right buttons -->
              <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                <!-- Toggle dark theme button -->
                <button aria-hidden="true" class="relative focus:outline-none" @click="toggleTheme">
                  <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"></div>
                  <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm translate-x-0 -translate-y-px bg-white text-primary-dark" :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                    <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                  </div>
                </button>

                <!-- Notification button -->
                <button @click="openNotificationsPanel" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                  <span class="sr-only">Open Notification panel</span>
                  <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                  </svg>
                </button>

                <!-- Search button -->
                <button @click="openSearchPanel" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                  <span class="sr-only">Open search panel</span>
                  <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </button>

                <!-- Settings button -->
                <button @click="openSettingsPanel" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                  <span class="sr-only">Open settings panel</span>
                  <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </button>

                <!-- User avatar button -->
                <div class="relative" x-data="{ open: false }">
                  <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100" aria-expanded="false">
                    <span class="sr-only">User menu</span>
                    <img class="w-10 h-10 rounded-full" src="build/images/avatar.jpg" alt="Ahmed Kamel">
                  </button>

                  <!-- User dropdown menu -->
                  <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false" @keydown.escape="open = false" class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none" tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu" style="display: none;">
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Your Profile
                    </a>
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Settings
                    </a>
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Logout
                    </a>
                  </div>
                </div>
              </nav>

              <!-- Mobile sub menu -->
              <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500" x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0" x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false" class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden" aria-label="Secondary" style="display: none;">
                <div class="space-x-2">
                  <!-- Toggle dark theme button -->
                  <button aria-hidden="true" class="relative focus:outline-none" @click="toggleTheme">
                    <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"></div>
                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm translate-x-0 -translate-y-px bg-white text-primary-dark" :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                      <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                      </svg>
                      <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                      </svg>
                    </div>
                  </button>

                  <!-- Notification button -->
                  <button @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open notifications panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                  </button>

                  <!-- Search button -->
                  <button @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open search panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                  </button>

                  <!-- Settings button -->
                  <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open settings panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </button>
                </div>

                <!-- User avatar button -->
                <div class="relative ml-auto" x-data="{ open: false }">
                  <button @click="open = !open" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100" aria-expanded="false">
                    <span class="sr-only">User menu</span>
                    <img class="w-10 h-10 rounded-full" src="build/images/avatar.jpg" alt="Ahmed Kamel">
                  </button>

                  <!-- User dropdown menu -->
                  <div x-show="open" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false" class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark" role="menu" aria-orientation="vertical" aria-label="User menu" style="display: none;">
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Your Profile
                    </a>
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Settings
                    </a>
                    <a href="#" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                      Logout
                    </a>
                  </div>
                </div>
              </nav>
            </div>
            <!-- Mobile main manu -->
            <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen" @click.away="isMobileMainMenuOpen = false" style="display: none;">
              <nav aria-label="Main" class="px-2 py-4 space-y-2">
                <!-- Dashboards links -->
                <div x-data="{ isActive: true, open: true}">
                  <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary bg-primary-100 dark:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="true">
                    <span aria-hidden="true">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Dashboards </span>
                    <span class="ml-auto" aria-hidden="true">
                      <!-- active class 'rotate-180' -->
                      <svg class="w-4 h-4 transition-transform transform rotate-180" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </span>
                  </a>
                  <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="index.html" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                      Default
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Project Mangement (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      E-Commerce (soon)
                    </a>
                  </div>
                </div>

                <!-- Components links -->
                <div x-data="{ isActive: false, open: false }">
                  <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                    <span aria-hidden="true">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Components </span>
                    <span aria-hidden="true" class="ml-auto">
                      <!-- active class 'rotate-180' -->
                      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </span>
                  </a>
                  <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components" style="display: none;">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Alerts (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Buttons (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Cards (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Dropdowns (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Forms (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Lists (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Modals (soon)
                    </a>
                  </div>
                </div>

                <!-- Pages links -->
                <div x-data="{ isActive: false, open: false }">
                  <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                    <span aria-hidden="true">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Pages </span>
                    <span aria-hidden="true" class="ml-auto">
                      <!-- active class 'rotate-180' -->
                      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </span>
                  </a>
                  <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages" style="display: none;">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="pages/blank.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Blank
                    </a>
                    <a href="pages/404.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      404
                    </a>
                    <a href="pages/500.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      500
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Profile (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Pricing (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Kanban (soon)
                    </a>
                    <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Feed (soon)
                    </a>
                  </div>
                </div>

                <!-- Authentication links -->
                <div x-data="{ isActive: false, open: false}">
                  <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                    <span aria-hidden="true">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Authentication </span>
                    <span aria-hidden="true" class="ml-auto">
                      <!-- active class 'rotate-180' -->
                      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </span>
                  </a>
                  <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication" style="display: none;">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="auth/register.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Register
                    </a>
                    <a href="auth/login.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Login
                    </a>
                    <a href="auth/forgot-password.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Forgot Password
                    </a>
                    <a href="auth/reset-password.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                      Reset Password
                    </a>
                  </div>
                </div>

                <!-- Layouts links -->
                <div x-data="{ isActive: false, open: false}">
                  <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                    <span aria-hidden="true">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Layouts </span>
                    <span aria-hidden="true" class="ml-auto">
                      <!-- active class 'rotate-180' -->
                      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                    </span>
                  </a>
                  <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts" style="display: none;">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="layouts/two-columns-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Two Columns Sidebar
                    </a>
                    <a href="layouts/mini-plus-one-columns-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Mini + One Columns Sidebar
                    </a>
                    <a href="layouts/mini-column-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                      Mini Column Sidebar
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </header>

          <!-- Main content -->
          <main>
            <!-- Content header -->
            <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
              <h1 class="text-2xl font-semibold">Dashboard</h1>
              <a href="https://github.com/Kamona-WD/kwd-dashboard" target="_blank" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                View on github
              </a>
            </div>

            <!-- Content -->
            <div class="mt-2">
              <!-- State cards -->
              <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                <!-- Value card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                      Value
                    </h6>
                    <span class="text-xl font-semibold">$30,000</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +4.4%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Users card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                      Users
                    </h6>
                    <span class="text-xl font-semibold">50,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +2.6%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Orders card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                      Orders
                    </h6>
                    <span class="text-xl font-semibold">45,021</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                      </svg>
                    </span>
                  </div>
                </div>

                <!-- Tickets card -->
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                  <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                      Tickets
                    </h6>
                    <span class="text-xl font-semibold">20,516</span>
                    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                      +3.1%
                    </span>
                  </div>
                  <div>
                    <span>
                      <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                      </svg>
                    </span>
                  </div>
                </div>
              </div>

              <!-- Charts -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Thống Kê Doanh Số Đặt Hàng</h4>
                    <div class="flex items-center space-x-2">
                      <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                      <button class="relative focus:outline-none" @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                        <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"></div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm translate-x-0 bg-white dark:bg-primary-100" :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="barChart" width="1218" height="512" style="display: block; height: 256px; width: 609px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>

                <!-- Doughnut chart card -->
                <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                    <div class="flex items-center">
                      <button class="relative focus:outline-none" @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                        <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"></div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm translate-x-0 bg-white dark:bg-primary-100" :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="doughnutChart" width="544" height="512" style="display: block; height: 256px; width: 272px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>

              <!-- Two grid columns -->
              <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Active users chart -->
                <div class="col-span-1 bg-white rounded-md dark:bg-darker">
                  <!-- Card header -->
                  <div class="p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right now</h4>
                  </div>
                  <p class="p-4">
                    <span class="text-2xl font-medium text-gray-500 dark:text-light" id="usersCount">90</span>
                    <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
                  </p>
                  <!-- Chart -->
                  <div class="relative p-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="activeUsersChart" width="544" height="300" style="display: block; height: 150px; width: 272px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>

                <!-- Line chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                  <!-- Card header -->
                  <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
                    <div class="flex items-center">
                      <button class="relative focus:outline-none" @click="isOn = !isOn; $parent.updateLineChart()">
                        <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker"></div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm translate-x-0 bg-white dark:bg-primary-100" :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }"></div>
                      </button>
                    </div>
                  </div>
                  <!-- Chart -->
                  <div class="relative p-4 h-72"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="lineChart" width="1218" height="512" style="display: block; height: 256px; width: 609px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </main>

          <!-- Main footer -->
          <footer class="flex items-center justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker">
            <div>K-WD © 2021</div>
            <div>
              Made by
              <a href="https://github.com/Kamona-WD" target="_blank" class="text-blue-500 hover:underline">Ahmed Kamel</a>
            </div>
          </footer>
          
        </div>
        <script>
    // Access specific property in JavaScript
    
   
</script>

    
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
        <script src="./builds/js/script.js"></script>
        

        <script>


const salesDataInJs = @json($salesData);


const months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

// Tạo một đối tượng ánh xạ tháng sang giá trị
const monthToValueMap = salesDataInJs.reduce((map, item) => {
  const monthNumber = parseInt(item.thang, 10);
  map[monthNumber] = item.doanh_so;
  return map;
}, {});

// Tạo mảng dữ liệu cho biểu đồ, gán giá trị mặc định là 0 nếu không có dữ liệu
const monthlySalesData = months.map(month => monthToValueMap[month] || 0);

const cssColors = (color) => {
  return getComputedStyle(document.documentElement).getPropertyValue(color)

}
const getColor = () => {
  return window.localStorage.getItem('color') ?? 'cyan'
}
const colors = {
  primary: cssColors(`--color-${getColor()}`),
  primaryLight: cssColors(`--color-${getColor()}-light`),
  primaryLighter: cssColors(`--color-${getColor()}-lighter`),
  primaryDark: cssColors(`--color-${getColor()}-dark`),
  primaryDarker: cssColors(`--color-${getColor()}-darker`),
}

const barChart = new Chart(document.getElementById('barChart'), {
  type: 'bar',
  data: {
    labels: months,
    datasets: [
      {
        data: monthlySalesData,
        backgroundColor: colors.primary,
        hoverBackgroundColor: colors.primaryDark,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          gridLines: false,
          ticks: {
            beginAtZero: true,
            stepSize: 50,
            fontSize: 12,
            fontColor: '#97a4af',
            fontFamily: 'Open Sans, sans-serif',
            padding: 10,
          },
        },
      ],
      xAxes: [
        {
          gridLines: false,
          ticks: {
            fontSize: 12,
            fontColor: '#97a4af',
            fontFamily: 'Open Sans, sans-serif',
            padding: 5,
          },
          categoryPercentage: 0.5,
          maxBarThickness: '10',
        },
      ],
    },
    cornerRadius: 2,
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
  },
})
     

const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }

          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

        const getColor = () => {
          if (window.localStorage.getItem('color')) {
            return window.localStorage.getItem('color')
          }
          return 'cyan'
        }

        const setColors = (color) => {
          const root = document.documentElement
          root.style.setProperty('--color-primary', `var(--color-${color})`)
          root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
          root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
          root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
          root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
          root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
          root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
          this.selectedColor = color
          window.localStorage.setItem('color', color)
          //
        }

        const updateBarChart = (on) => {
          const data = {
            data: randomData(),
            backgroundColor: 'rgb(207, 250, 254)',
          }
          if (on) {
            barChart.data.datasets.push(data)
            barChart.update()
          } else {
            barChart.data.datasets.splice(1)
            barChart.update()
          }
        }

        const updateDoughnutChart = (on) => {
          const data = random()
          const color = 'rgb(207, 250, 254)'
          if (on) {
            doughnutChart.data.labels.unshift('Seb')
            doughnutChart.data.datasets[0].data.unshift(data)
            doughnutChart.data.datasets[0].backgroundColor.unshift(color)
            doughnutChart.update()
          } else {
            doughnutChart.data.labels.splice(0, 1)
            doughnutChart.data.datasets[0].data.splice(0, 1)
            doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
            doughnutChart.update()
          }
        }

        const updateLineChart = () => {
          lineChart.data.datasets[0].data.reverse()
          lineChart.update()
        }

        return {
          loading: true,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
          setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
          },
          setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
          },
          color: getColor(),
          selectedColor: 'cyan',
          setColors,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          openSettingsPanel() {
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.settingsPanel.focus()
            })
          },
          isNotificationsPanelOpen: false,
          openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.notificationsPanel.focus()
            })
          },
          isSearchPanelOpen: false,
          openSearchPanel() {
            this.isSearchPanelOpen = true
            this.$nextTick(() => {
              this.$refs.searchInput.focus()
            })
          },
          isMobileSubMenuOpen: false,
          openMobileSubMenu() {
            this.isMobileSubMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileSubMenu.focus()
            })
          },
          isMobileMainMenuOpen: false,
          openMobileMainMenu() {
            this.isMobileMainMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileMainMenu.focus()
            })
          },
          updateBarChart,
          updateDoughnutChart,
          updateLineChart,
        }
      }
      
    </script>
</body>

</html>
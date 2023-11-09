<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-WD Dashboard | Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../build/css/tailwind.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<body>
  @include("Component.Header")
  <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
      Loading.....
    </div>
    <div class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
      <!-- Brand -->
      <a href="../index.html" class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
        PIZZA STORE
      </a>
      <main>
        @if(isset($_SESSION['erro'] ))

        <h1>{{ $_SESSION['erro'] }}</h1>
        @endif
        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
          <h1 class="text-xl font-semibold text-center">Login</h1>
          @if ($errors->has('email'))
          <div class="alert alert-danger">
            <p class="text-red-500">{{ $errors->first('email') }}</p>
          </div>
          @endif

          <form action="/login" method="post" class="space-y-6">
            @csrf
            <input class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="email" name="email" placeholder="Email address" :value="old('email')" required autofocus />
            <input class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            <div class="flex items-center justify-between">
              <!-- Remember me toggle -->
              <label class="flex items-center">
                <div class="relative inline-flex items-center">

                </div>
                <!-- <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">Remember me</span> -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}">
                  <label class="form-check-label" for="remember">
                    Remember Me
                  </label>
                </div>
              </label>

              <a href="/forgot-password" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
            </div>
            <div>
              <button type="submit" class="bg-[#006a32] w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Login
              </button>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48" class="absolute ml-20 mt-0.5">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                  </svg>
              <button type="submit" class="bg-[#006a32] w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                <a href="{{route('auth.google') }}" class="btn btn-google">
                  Login with Google 
                </a>
              </button>

            </div>
          </form>

          <!-- Or -->
          <div class="flex items-center justify-center space-x-2 flex-nowrap">
            <span class="w-20 h-px bg-gray-300"></span>
            <span>OR</span>
            <span class="w-20 h-px bg-gray-300"></span>
          </div>

          <!-- Social login links -->
          <!-- Brand icons src https://boxicons.com -->
          <a href="/checkout/orderinfo" class="flex items-center justify-center px-4 py-2 space-x-2 text-white transition-all duration-200 bg-[#006a32] rounded-md hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 dark:focus:ring-offset-darker">

            <span> Mua Hàng Không Cần Đăng Nhập </span>
          </a>

          <!-- Register link -->
          <div class="text-sm text-gray-600 dark:text-gray-400">
            Don't have an account yet? <a href="/auth/register" class="text-blue-600 hover:underline">Register</a>
          </div>
        </div>
      </main>
    </div>
    <!-- Toggle dark mode button -->
    <div class="fixed bottom-5 left-5">
      <button aria-hidden="true" @click="toggleTheme" class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary">
        <svg x-show="isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
        </svg>
        <svg x-show="!isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </button>
    </div>
  </div>

  <script>
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
      }

      return {
        loading: true,
        isDark: getTheme(),
        color: getColor(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
        setColors,
      }
    }
  </script>
  @include("Component.Footer")
</body>

</html>
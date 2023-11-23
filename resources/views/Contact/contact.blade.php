<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    @include('Component.Header')
    <section class="text-gray-600 body-font bg-green-100 ">

        @if (session('success'))
        <div id="success-message" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-5 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">Message ^.^</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        <div class="container px-5  py-24 mx-auto flex flex-wrap ">

            <div class=" lg:w-2/3 p-5 flex flex-col flex-wrap lg:w-1/2 lg:pl-12 lg:text-left text-center rounded-lg
            border-solid border-2 border-white-600  ">
                <form method="post" action="/contact_cus">
                    @csrf
                    <div class="rounded-lg flex flex-col md:ml-auto w-full mt-10 md:mt-0 mb-5">
                        <div class=" flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                            <div class="relative flex-grow w-full">
                                <label for="fullname" class="leading-7 font-bold text-sm text-gray-600">Full Name </label>
                                <input type="text" id="fullname" name="fullname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative flex-grow w-full">
                                <label for="phone" class="leading-7 font-bold text-sm text-gray-600">Phone </label>
                                <input type="text" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="flex lg:w-2/3 mt-8 w-full sm:flex-row  flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">

                            <div class="relative flex-grow w-full">
                                <label for="email" class="leading-7  font-bold text-sm text-gray-600">Email &#8727; </label>
                                <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @if($errors->has('email'))
                                <div class="alert alert-danger text-red-500">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="relative flex-grow w-full">
                                <label for="subject " class="leading-7 font-bold text-sm text-gray-600">Subject </label>
                                <input type="text" id="subject" name="subject" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="flex lg:w-2/3 mt-8 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">

                            <div class="relative flex-grow w-full">
                                <label for="content" class="leading-7 font-bold text-sm text-gray-600">Content</label>
                                <input type="text" id="content" name="content" class="w-full bg-gray-100 h-40 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Enter the enquiry...">
                            </div>

                        </div>
                        <div class="flex lg:w-2/3 mt-8 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 text-left"></div>
                        <button class=" flex mx-auto text-white bg-red-500 border-0 py-2 px-20 focus:outline-none hover:bg-indigo-600 rounded text-lg">Sumbit &rarr;</button>
                    </div>
                    </from>
            </div>

            <div class="lg:w-1/3 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                <img alt="hinhanhlienhe" class="object-cover object-center h-full w-full" src="https://thepizzacompany.vn/Themes/Emporium/Content/img/hinh-lien-he-3.jpg">
            </div>
        </div>
    </section>
    @include('Component.Footer')
</body>

</html>
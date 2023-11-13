<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard Pizza Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="build/css/tailwind.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
  </head>
<body>


<div class="div flex">

<div class="w-1/4">
 @include('Component.SideBar')
 </div>






 <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <div class="button_add flex justify-end mr-3">
                <a href=""><button class="flex  mx-auto  text-white bg-gradient-to-r from-cyan-500 to-blue-500 border-0 py-2 px-9 m-5  rounded text-xs">Add Product</button></a>
                </div>
               
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">id</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">address</th>
                     
                      <th class="px-4 py-3">Product Name</th>
                      <th class="px-4 py-3">Price</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Payment Method</th>
                      <th class="px-4 py-3">Total Amount</th>
                      <th class="px-4 py-3">Time</th>
                      
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                 
                  @foreach($orders as $value)

                  
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                         
                          <p class="font-semibold"> {{$value->customer_id}}</p>
                           
                      
                          <div>
                           
                           
                            
                        
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <p class="font-semibold"> {{$value->name}}</p>
                      </td>
                      <?php
                      $adress = $value->apartmentNumber . "". $value->StreetNames . $value->details
                      ?>
                      <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight dark:bg-green-700 dark:text-green-100">
                        {{$adress}}
                        </span>
                      </td>
                    
                      <td class="px-4 py-3 text-sm">
                      {{$value->nameproduct}} <br>
                      <small> {{$value->quantity}}x</small>
                      </td>
                    
                      <td class="px-4 py-3 text-sm">
                      {{$value->price}}
                      </td>
                      
                      <td class="px-4 py-3 text-sm text-green-700 bg-green-100">
            <form method="get" action="/update-status">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="{{ $value->status }}">
              <input type="hidden" name="customerID" value="{{$value->customer_id}}">
              <div x-data="{ toggle: {{ $value->status === 1 ? 'true' : 'false' }} }">
                <button
                  class="transition ease-in-out duration-300 w-12 bg-gray-200 rounded-full focus:outline-none"
                  :class="{ 'bg-green-300': toggle }"
                  x-on:click="toggle = !toggle; updateStatus()"
                >
                  <div
                    class="transition ease-in-out duration-300 rounded-full h-6 w-6 bg-white shadow"
                    :class="{ 'transform translate-x-full': toggle }"
                  ></div>
                </button>
              
                <div class="text-xs" x-text="toggle ? 'Hoàn Thành':'Đang Giao Hàng'"></div>
              </div>
              
            </form>

  <script>
    function updateStatus() {
      document.querySelector('input[name="status"]').value = toggle ? '1' : '0';
      // You can remove the previous updateStatus code
      
      // Submit the form to update the status
      document.querySelector('form').submit();
    }
  </script>
</td>


                    

                      <td class="px-4 py-3 text-sm">
                        @if($value->payment_method == 2)
                        <p>COD</p>
                        @endif
                        @if($value->payment_method == 1)
                        <p>VN Pay</p>
                        @endif


                     
                      </td>

                      <td class="px-4 py-3 text-sm">
                      {{$value->total_amount}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$value->date_order}}
                      </td>
                     
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="#0fb1d8" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
                          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                            <svg class="w-5 h-5" aria-hidden="true" fill="#0fb1d8" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                        </div>
                      </td>
                    </tr>
                @endforeach
                   

                   
                  </tbody>
                </table>
              </div>
              <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                          1
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                          2
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                          3
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                          8
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                          9
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>
    

          </div>





          </body>
</html>
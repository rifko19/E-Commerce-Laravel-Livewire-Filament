<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent='placeOrder'>
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                            Shipping Address
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label wire:model='first_name' class="block text-gray-700 dark:text-white mb-1"
                                    for="first_name">
                                    First Name
                                </label>
                                <input
                                    class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                    @error('first_name') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                    id="first_name" type="text">
                                </input>
                                @error('first_name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label wire:model='last_name' class="block text-gray-700 dark:text-white mb-1"
                                    for="last_name">
                                    Last Name
                                </label>
                                <input
                                    class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                    @error('last_name') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                    id="last_name" type="text">
                                </input>
                                @error('last_name')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label wire:model='phone' class="block text-gray-700 dark:text-white mb-1" for="phone">
                                Phone
                            </label>
                            <input
                                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                @error('phone') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                id="phone" type="text">
                            </input>
                            @error('phone')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 dark:text-white mb-1" for="address">
                                Address
                            </label>
                            <input wire:model='street_address'
                                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                @error('street_address') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                id="address" type="text">
                            </input>
                            @error('street_address')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 dark:text-white mb-1" for="city">
                                City
                            </label>
                            <input wire:model='city'
                                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                @error('city') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                id="city" type="text">
                            </input>
                            @error('city')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="state">
                                    State
                                </label>
                                <input wire:model='state'
                                    class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                    @error('state') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                    id="state" type="text">
                                </input>
                                @error('state')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="zip">
                                    ZIP Code
                                </label>
                                <input wire:model='zip_code'
                                    class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white
                                    @error('zip_code') border-red-500 dark:border-red-500 @else dark:border-none @enderror"
                                    id="zip" type="text">
                                </input>
                                @error('zip_code')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold mb-4 dark:text-white">
                        Select Payment Method
                    </div>
                    @error('payment_method')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model='payment_method' class="hidden peer" id="hosting-small" required=""
                                type="radio" value="cod" />
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 @error('zip_code') border-red-500 dark:border-red-500 @else dark:border-none @enderror dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-small">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Cash on Delivery
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                        </li>
                        <li>
                            <input wire:model='payment_method' class="hidden peer" id="hosting-big" type="radio"
                                value="stripe">
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 @error('zip_code') border-red-500 dark:border-red-500 @else dark:border-none @enderror dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-big">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Stripe
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                            </input>
                        </li>
                    </ul>
                </div>
                <!-- End Card -->
            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                        ORDER SUMMARY
                    </div>
                    <div class="flex justify-between mb-2 font-bold dark:text-white">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            {{ Number::currency($grand_total, 'IDR') }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold dark:text-white">
                        <span>
                            Taxes
                        </span>
                        <span>
                            {{ Number::currency(0, 'IDR') }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold dark:text-white">
                        <span>
                            Shipping Cost
                        </span>
                        <span>
                            0.00
                        </span>
                    </div>
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold dark:text-white">
                        <span>
                            Grand Total
                        </span>
                        <span>
                            {{ Number::currency($grand_total, 'IDR') }}
                        </span>
                    </div>
                    </hr>
                </div>
                <button type="Submit"
                    class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
                    Place Order
                </button>
                <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                        BASKET SUMMARY
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
                        @foreach ($cart_items as $ci)
                            <li class="py-3 sm:py-4" wire:key='{{ $ci['product_id'] }}'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img alt="{{ $ci['name'] }}" class="w-12 h-12 rounded-full"
                                            src="{{ url('storage', $ci['image']) }}">
                                        </img>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $ci['name'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Quantity: {{ $ci['quantity'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ Number::currency($ci['total_amount'], 'IDR') }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <a href="https://wa.me/6282181682461" class="whatsapp-button" target="_blank" title="Chat via WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24">
            <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
    </a>
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 30px;
            cursor: pointer;
            z-index: 1000;
            text-decoration: none;
        }

        .whatsapp-button:hover {
            background-color: #20c056;
        }

        .whatsapp-icon {
            font-size: 28px;
        }
    </style>
</div>

<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Don't have an account yet?
                            <a wire:navigate
                                class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="/register">
                                Sign up here
                            </a>
                        </p>
                    </div>

                    <hr class="my-5 border-slate-300">

                    <!-- Form -->
                    <form wire:submit.prevent='save'>
                        @if (session('error'))
                            <div id="errorAlert"
                                class="mt-2 bg-red-500 text-sm text-white rounded-lg p-4 mb-4 flex justify-between items-center"
                                role="alert" tabindex="-1" aria-labelledby="hs-solid-color-danger-label">
                                <span>{{ session('error') }}</span>
                                <button type="button" class="ml-4 text-white"
                                    onclick="document.getElementById('errorAlert').style.display='none'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif



                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" wire:model="email"
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        aria-describedby="email-error">
                                    @error('email')
                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('email')
                                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div x-data="{ show: false }" class="relative">
                                <input :type="show ? 'text' : 'password'" id="password" wire:model="password"
                                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    aria-describedby="password-error">
                                <button type="button" @click="show = !show"
                                    class="absolute inset-y-0 right-0 flex items-center px-3">
                                    <svg x-show="!show" class="h-5 w-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <!-- Icon mata tertutup -->
                                        <path
                                            d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12c-3.9 0-6.6-2.9-8-5 1.4-2.1 4.1-5 8-5 3.9 0 6.6 2.9 8 5-1.4 2.1-4.1 5-8 5zm0-9c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                                    </svg>
                                    <svg x-show="show" class="h-5 w-5 text-gray-500" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <!-- Icon mata terbuka -->
                                        <path
                                            d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12c-3.9 0-6.6-2.9-8-5 1.4-2.1 4.1-5 8-5 3.9 0 6.6 2.9 8 5-1.4 2.1-4.1 5-8 5zm0-9c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                                    </svg>
                                </button>
                                @error('password')
                                    <div class="absolute inset-y-0 right-10 flex items-center pointer-events-none pr-3">
                                        <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            <!-- End Form Group -->
                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
                                in</button>
                        </div>
                    </form>

                    <!-- End Form -->
                </div>
            </div>
    </div>
</div>

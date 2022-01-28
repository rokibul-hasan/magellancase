
<x-guest-layout>
        <div class="w-full flex flex-wrap" style="border-top: 10px solid #DD8500;border-bottom: 10px solid #DD8500;">
    
            <!-- Login Section -->
            <div class="w-full md:w-1/2 flex flex-col" >
    
                
    
                <div class="flex flex-col justify-center md:justify-start my-auto pt-2 md:pt-0 px-8 md:px-24 lg:px-32" style="max-width:500px;margin-left:auto;margin-right:auto">

                    <div class="flex justify-center md:justify-start pt-12">
                        <img class="m-auto" src="{{asset('logo.png')}}" alt="">
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
            
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                        </div>
            
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
            
                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div>
    
            </div>
    
            <!-- Image Section -->
            <div class="w-1/2 shadow-2xl">
                <img class="object-cover w-full h-screen hidden md:block" src="https://www.lostheirsfound.com/wp-content/uploads/2014/03/About-Us-blurred-with-Logo-on-Wall-820x1136-739x1024.png">
            </div>
        </div>
</x-guest-layout>
    


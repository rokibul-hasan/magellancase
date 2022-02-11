<x-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __($title) }}
    </h2>


    <form action="{{ route('user.update',$user->id) }}" method="post">
        @csrf
        @method('put')

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 mb-1 w-full" type="text" name="name" value="{{$user->name}}"  required autofocus placeholder="Enter Name" />
                            @error('name') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>


                    <div>
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 mb-1 w-full" type="text" name="email" value="{{$user->email}}"
                            required autofocus placeholder="Enter Email" />
                            @error('email') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>

                    <div>
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 mb-1 w-full" type="password" name="password"
                            autofocus placeholder="Enter Password" />
                            @error('password') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>

                    <div>
                        <x-label for="address" :value="__('address')" />
                        <x-input id="address" class="block mt-1 mb-1 w-full" type="text" name="address" required value="{{$user->userinfo->address ?? ''}}"
                            autofocus placeholder="Enter Address" />
                            @error('address') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>

                    <div class="md:flex md:justify-between">

                        <div class="md:w-1/2">
                            <x-label for="city" :value="__('City')" />
                            <x-input id="city" class="block mt-1 mb-1 w-full" type="text" name="city"
                                value="{{$user->userinfo->city ?? ''}}" required autofocus placeholder="Enter City" />
                                @error('city') <span class="text-red-100">{{ $message }}</span>  @enderror
                        </div>

                        <div class="md:w-1/2">
                            <x-label for="state" :value="__('State')" />
                            <x-input id="state" class="block mt-1 mb-1 w-full" type="text" name="state"
                                value="{{$user->userinfo->state ?? ''}}" required autofocus placeholder="Enter State" />
                                @error('state') <span class="text-red-100">{{ $message }}</span>  @enderror
                        </div>

                    </div>

                    <div>
                        <x-label for="zipcode" :value="__('Zip Code')" />
                        <x-input id="zipcode" class="block mt-1 mb-1 w-full" type="text" name="zipcode"
                            value="{{$user->userinfo->zip ?? ''}}" required autofocus placeholder="Enter Zip Code" />
                            @error('zip') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>

                    <div>
                        <x-label for="phone1" :value="__('Phone 1')" />
                        <x-input id="phone1" class="block mt-1 mb-1 w-full" type="text" name="phone1"
                            value="{{$user->userinfo->phone1 ?? ''}}" required autofocus placeholder="Enter Phone 1" />
                            @error('phone1') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>
                    <div>
                        <x-label for="phone2" :value="__('Phone 2')" />
                        <x-input id="phone2" class="block mt-1 mb-1 w-full" type="text" name="phone2"
                            value="{{$user->userinfo->phone2 ?? ""}}" required autofocus placeholder="Enter Phone 2" />
                            @error('phone2') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </div>


                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Is Admin
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="isAdmin" value="no" {{$user->isAdmin=='no'? 'checked' : ''}}>
                                <span class="ml-2">No</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="isAdmin" value="yes" {{$user->isAdmin=='yes'? 'checked' : ''}}>
                                <span class="ml-2">Yes</span>
                            </label>
                        </div>
                    </div>





                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Comments</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter Comments" name="comment">{{$user->userinfo->comment ?? ''}}</textarea>
                            @error('comment') <span class="text-red-100">{{ $message }}</span>  @enderror
                    </label>

                    <div class="flex justify-between w-full">
                        <div class="flex items-center justify-start mt-4 ">
                            <a href="{{ route('user.index')}}" class="bg-black text-white p-2 rounded"> <i class="fa fa-arrow-left"></i> Back</a>
                         </div>
     
                         <div class="flex items-center justify-end mt-4">
                             <x-button class="ml-4 bg-black">
                                 {{ __('Submit') }}
                             </x-button>
                         </div>
                    </div>

                    




                </div>




            </div>

    </form>

    </div>

</x-app-layout>

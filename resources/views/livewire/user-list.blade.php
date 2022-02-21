<div>
    <x-linkButton href="#" class="float-right mb-2" wire:click="openAddUser()">Add New User</x-linkButton>


    <x-wireloading />

    @if (session()->has('message'))
        {!! session('message') !!}
    @endif

    @if ($addFormHide == false)

        @if ($userid)
            <form wire:submit.prevent="updateForm">
                <input type="hidden" wire:model.defer="userid" name="userid" value="{{ $userid }}">
            @else
                <form wire:submit.prevent="submitForm">
        @endif

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <div wire:loading>
                        Processing Data...
                    </div>



                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input wire:model.defer="name" id="name" class="block mt-1 mb-1 w-full" type="text" name="name"
                            :value="old('name')" required placeholder="Enter Name" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        <x-label for="email" :value="__('Email')" />
                        <x-input wire:model.defer="email" id="email" class="block mt-1 mb-1 w-full" type="text"
                            name="email" :value="old('email')" required placeholder="Enter Email" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="password" :value="__('Password')" />
                        <x-input wire:model.defer="password" id="password" class="block mt-1 mb-1 w-full" type="password"
                            name="password" placeholder="Enter Password" />

                    </div>

                    <div>
                        <x-label for="address" :value="__('address')" />
                        <x-input wire:model.defer="address" id="address" class="block mt-1 mb-1 w-full" type="text"
                            name="address" required :value="old('address')" placeholder="Enter Address" />
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md:flex md:justify-between">

                        <div class="md:w-1/2 mr-1">
                            <x-label for="city" :value="__('City')" />
                            <x-input wire:model.defer="city" id="city" class="block mt-1 mb-1 w-full" type="text"
                                name="city" :value="old('city')" required placeholder="Enter City" />
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="md:w-1/2 ml-1">
                            <x-label for="state" :value="__('State')" />
                            <x-input wire:model.defer="state" id="state" class="block mt-1 mb-1 w-full" type="text"
                                name="state" :value="old('state')" required placeholder="Enter State" />
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>

                    <div>
                        <x-label for="zipcode" :value="__('Zip Code')" />
                        <x-input wire:model.defer="zipcode" id="zipcode" class="block mt-1 mb-1 w-full" type="text"
                            name="zipcode" :value="old('zipcode')" required placeholder="Enter Zip Code" />
                        @error('zipcode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="phone1" :value="__('Phone 1')" />
                        <x-input wire:model.defer="phone1" id="phone1" class="block mt-1 mb-1 w-full" type="text"
                            name="phone1" :value="old('phone1')" required placeholder="Enter Phone 1" />
                        @error('phone1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="phone2" :value="__('Phone 2')" />
                        <x-input wire:model.defer="phone2" id="phone2" class="block mt-1 mb-1 w-full" type="text"
                            name="phone2" :value="old('phone2')" placeholder="Enter Phone 2" />
                        @error('phone2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>







                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Is Admin
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input wire:model.defer="isAdmin" type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="isAdmin" value="no" checked>
                                <span class="ml-2">No</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input wire:model.defer="isAdmin" type="radio"
                                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="isAdmin" value="yes">
                                <span class="ml-2">Yes</span>
                            </label>
                        </div>
                    </div>





                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Comments</span>
                        <textarea wire:model.defer="comment"
                            class="border p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter Comments" name="comment"></textarea>
                    </label>


                    <div class="flex justify-between w-full">
                        <div class="flex items-center justify-start mt-4 ">
                            
                            <x-button wire:click="closeAddUser()" type="button" class="ml-4 bg-black">
                                {{ __('Close') }}
                            </x-button>
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
        @else

            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Admin</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach ($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->

                                    <div>
                                        <p class="font-semibold">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">

                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $user->isAdmin ?? '' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <x-linkButton href="#" class="float-right"
                                    wire:click="UserEdit({{ $user->id }})">Edit
                                </x-linkButton>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <div class="p-2">

                {{ $users->links() }}

            </div>

    @endif
</div>

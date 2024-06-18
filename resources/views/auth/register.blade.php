<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Department -->
        <div class="mt-4">
            <x-input-label for="department" :value="__('Department')" />
            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" />
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <!-- Session -->
        <div class="mt-4">
            <x-input-label for="session" :value="__('Session')" />
            <x-text-input id="session" class="block mt-1 w-full" type="number" name="session" :value="old('session')" />
            <x-input-error :messages="$errors->get('session')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" />
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Blood Group -->
        <div class="mt-4">
            <x-input-label for="blood_group" :value="__('Blood Group')" />
            <x-text-input id="blood_group" class="block mt-1 w-full" type="text" name="blood_group" :value="old('blood_group')" />
            <x-input-error :messages="$errors->get('blood_group')" class="mt-2" />
        </div>

        <!-- Class Roll -->
        <div class="mt-4">
            <x-input-label for="class_roll" :value="__('Class Roll')" />
            <x-text-input id="class_roll" class="block mt-1 w-full" type="number" name="class_roll" :value="old('class_roll')" />
            <x-input-error :messages="$errors->get('class_roll')" class="mt-2" />
        </div>

        <!-- Father Name -->
        <div class="mt-4">
            <x-input-label for="father_name" :value="__('Father Name')" />
            <x-text-input id="father_name" class="block mt-1 w-full" type="text" name="father_name" :value="old('father_name')" />
            <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
        </div>

        <!-- Mother Name -->
        <div class="mt-4">
            <x-input-label for="mother_name" :value="__('Mother Name')" />
            <x-text-input id="mother_name" class="block mt-1 w-full" type="text" name="mother_name" :value="old('mother_name')" />
            <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
        </div>

        <!-- Current Address -->
        <div class="mt-4">
            <x-input-label for="current_address" :value="__('Current Address')" />
            <x-text-input id="current_address" class="block mt-1 w-full" type="text" name="current_address" :value="old('current_address')" />
            <x-input-error :messages="$errors->get('current_address')" class="mt-2" />
        </div>

        <!-- Permanent Address -->
        <div class="mt-4">
            <x-input-label for="permanent_address" :value="__('Permanent Address')" />
            <x-text-input id="permanent_address" class="block mt-1 w-full" type="text" name="permanent_address" :value="old('permanent_address')" />
            <x-input-error :messages="$errors->get('permanent_address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

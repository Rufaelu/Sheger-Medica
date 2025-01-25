<style xmlns="http://www.w3.org/1999/html">
    .head{
        display: flex;
        flex-direction: column;
    }
#title{
    text-align: center;
}
    input, select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        /*border: 0px solid #d2d2d2; !* Light gray border *!*/
        border-radius: 8px;
        /*outline: none;*/
        background-color: #ffffff; /* White background */
        color: #111827; /* Dark text */
        transition: border-color 0.2s ease-in-out;
    }
    .form-section{
        margin-top: 2vh;
    }
label{
    font-size: 2vh  ;
    color: #313030;
}
    input:focus, select:focus {
        border-color: #6366f1; /* Laravel Breeze purple */
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3); /* Purple focus ring */
    }

    input::placeholder {
        color: #9ca3af; /* Gray placeholder text */
    }

    select {
        appearance: none; /* Remove default dropdown styles */
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%239CA3AF'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 11.06l3.71-3.83a.75.75 0 111.08 1.04l-4.25 4.38a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z' clip-rule='evenodd'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 1em;
    }

    input[type="file"] {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #d1d5db;
        background-color: #ffffff;
        cursor: pointer;
    }



    /* From Uiverse.io by TimTrayler */
    .switch {
        --secondary-container: #3a4b39;
        --primary: #84da89;
        font-size: 17px;
        position: relative;
        display: inline-block;
        width: 2.2em;
        height: 1.2em;
        margin-top: 0.2vh;
    }

    .switch input {
        display: none;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #313033;
        transition: .2s;;
        border-radius: 30px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 0.6em;
        width: 0.6em;
        border-radius: 20px;
        left: 0.4em;
        bottom: 0.4em;
        background-color: #aeaaae;
        transition: .4s;
    }

    input:checked + .slider::before {
        background-color: var(--primary);
    }

    input:checked + .slider {
        background-color: var(--secondary-container);
    }

    input:focus + .slider {
        box-shadow: 0 0 1px var(--secondary-container);
    }

    input:checked + .slider:before {
        transform: translateX(0.9em);
    }
    .check{
        margin-top: 1vh;
    }

</style>

<x-guest-layout >
<div class="head">
    <x-logo/>
    <h1 id="title">Welcome To Sheger Medica</h1>

</div>
    <form method="POST" action="{{route('adduser')}}" enctype="multipart/form-data">
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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
{{-- DOB--}}
        <div class="form-section">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" style="border-radius: 6px; border-color: #c9c8c8" required>
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />

        </div>
{{--Gender--}}
        <div class="form-section">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" style="border-radius: 6px; border-color: #c9c8c8" required>
                <option value="" disabled selected>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />

        </div>
        <div class="check" style=" border-radius: 6px">
            <fieldset style="display: flex; flex-direction: row; gap:1vw; ">
            <h6>I'm a practitioner</h6>
        <label class="switch">
            <input type="checkbox" name="checkbox" id="checkbox" >
            <span class="slider"></span>
        </label>
            </fieldset>
            <div style="display: none; flex-direction: column; gap: 2vh" id="practfiled" >
                <div class="form-section">
                    <label for="specialty">Specialty:</label>
                    <select id="specialty" name="specialty" style="border-radius: 6px; border-color: #c9c8c8" >
                        <option value="" disabled selected>Select your specialty</option>
                        <option value="herbalist">Herbalist</option>
                        <option value="traditionalhealer">Traditional Healer </option>
                        <option value="veterinary">Veterinary Healer</option>
                        <option value="nutritionists">Nutritionists</option>
                        <option value="midwives">Midwives</option>
                    </select>
                </div>
                <div class="form-section">
                    <label for="certificate">Certificate and ID(could be national, kebele) (PDF):</label>
                    <input type="file" id="certificate" name="certificate" accept="application/pdf">
                </div>
            </div>

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script >
    const toggleCheckbox = document.getElementById('checkbox');
    const additionalFields = document.getElementById('practfiled');

    // Add event listener to toggle visibility
    toggleCheckbox.addEventListener('change', function () {
        if (this.checked) {
            additionalFields.style.display="flex";
        } else {
            additionalFields.style.display="none"; // Hide fields
        }
    });
</script>

<x-guest-layout class="back">
    <form method="POST" action="{{ route('register') }}" class="back">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" class="label" :value="__('Name')" />
            <x-text-input id="name" class="custom-file-input tex block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="label" :value="__('Email')" />
            <x-text-input id="email" class="custom-file-input tex block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="label"  for="password" :value="__('Password')" />

            <x-text-input id="password" class="custom-file-input tex block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="label" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="custom-file-input tex block mt-1 w-full"
                type=" password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Date of Birth-->
        <div class="mt-4">
            <x-input-label for="dob" class="label" :value="__('Date Of Birth')" />

            <x-text-input id="dob" class="custom-file-input block mt-1 w-full"
                type=" date"
                name="dob" required />

        </div>

        <!-- Gender-->
        <div class="mt-4">
            <x-input-label for="dob" class="label" :value="__('Gender')" />

            <select id="gender" name="gender" required class="custom-file-input  block mt-1 w-full" style=" color:aliceblue;border-radius:7.6px; border: solid rgb(55, 58, 65) 1px">
                <option value="" disabled selected>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

        </div>
        <div class="file-input-container mt-4">
            <!-- Certificate -->
            <x-input-label for="certificate" class="label" :value="__('Certificate (for verification)')" />

            <label for="certificate" class="custom-file-input block mt-1 w-full">
                <span class="file-label">Upload certificate pdf...</span>
                <input id="certificate" name="certificate" type="file" required accept=".pdf" required />
            </label>
        </div>

        <div class="file-input-container mt-4">
            <!-- ID Image -->
            <x-input-label for="id_image" class="label" :value="__('ID Image (for verification)')" />

            <label for="id_image" class="custom-file-input block mt-1 w-full">
                <span class="file-label">Upload ID pdf...</span>
                <input id="id_image" name="id_image" type="file" required multiple required accept=".pdf" />
            </label>
        </div>

        <style>
            /* Container for the file inputs */
            .flex {
                background-color: white;
            }


            .w-full,
            .back {
                background-color: rgb(232, 233, 234);
            }

            .label {
                color: #111827;
            }

            .file-input-container {
                position: relative;
            }

            /* Label styling for the custom file input */
            .custom-file-input {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px 15px;
                background-color: rgb(169, 170, 171);
                color: aliceblue;
                border: 1px solid rgb(55, 58, 65);
                border-radius: 7.6px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            /* Inner text for the file label */
            .file-label {
                font-size: 0.9rem;
                opacity: 0.8;
            }

            /* Hidden input */
            input[type="file"] {
                display: none;
            }

            /* Hover and focus effects */
            .custom-file-input:hover {
                background-color: #1f2937;
                border-color: #4f46e5;
            }

            .tex {
                cursor: vertical-text;

            }

            .custom-file-input:active {
                background-color: #374151;
            }
            .already{
                color: #111827;
            }
            .already:hover{
                color:rgb(1, 79, 245);
            }
            .button:hover{
                background-color:rgb(129, 253, 127);
            }
            .button{
                background-color: white;
            }
            .finish{
                background-color: transparent;
                gap: 1vw;
            }
        </style>

        <script>
            // Update the file input label with the selected file name for both inputs
            document.querySelectorAll('input[type="file"]').forEach((input) => {
                const fileLabel = input.parentElement.querySelector(".file-label");

                input.addEventListener("change", function() {
                    const fileName = this.files[0]?.name || "Choose a file...";
                    fileLabel.textContent = fileName;
                });
            });
        </script>



        <div class="flex items-center  finish justify-end mt-4">
            <a class="already" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="button">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
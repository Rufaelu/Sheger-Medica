<style>/* General Styling */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
    }

    h3 {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
    }

    p {
        margin: 0.5rem 0;
        font-size: 0.875rem;
        color: #4b5563;
    }

    label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
    }

    input, textarea, select, button {
        width: 100%;
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
        margin-top: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        background-color: #ffffff;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    input:focus, textarea:focus, button:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
    }

    textarea {
        resize: vertical;
    }

    button {
        color: #ffffff;
        background-color: #6366f1;
        cursor: pointer;
    }

    button:hover {
        background-color: #4f46e5;
    }

    button:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
    }

    button:disabled {
        background-color: #d1d5db;
        cursor: not-allowed;
    }

    /* Layout */
    .container {
        margin: 0 auto;
        padding: 1rem;
        max-width: 1200px;
    }

    .grid {
        display: grid;
        gap: 1.5rem;
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }

    .md\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .md\:col-span-1 {
        grid-column: span 1 / span 1;
    }

    .md\:col-span-2 {
        grid-column: span 2 / span 2;
    }

    /* Cards */
    .card {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card h4 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .card ul {
        list-style-type: disc;
        padding-left: 1rem;
        margin-top: 0.5rem;
    }

    .card ul li {
        font-size: 0.875rem;
        color: #374151;
    }

    /* Statistics */
    .stats {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .stats .stat {
        flex: 1 1 calc(50% - 1rem);
        text-align: center;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 1rem;
        background-color: #f9fafb;
    }

    .stats .stat dt {
        font-size: 0.875rem;
        font-weight: 500;
        color: #6b7280;
    }

    .stats .stat dd {
        font-size: 1.25rem;
        font-weight: 600;
        color: #111827;
    }


    /* Dividers */
    .divider {
        height: 1px;
        background-color: #e5e7eb;
        margin: 2rem 0;
    }

    /* Responsive */
    @media (min-width: 768px) {
        .grid {
            gap: 2rem;
        }
    }

    </style>
    <x-nav-bar/>

    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="md:col-span-1">
                <h3 class="card">Practitioner Information</h3>
                <p class="card">
                    Manage your professional profile and specialties.
                </p>
            </div>
            @if(Auth::user()->user_id == $user->user_id || Auth::user()->hasRole('admin'))
            <div class="delete">
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <button type="submit">Delete Account</button>
                </form>
                 </div>
            @endif
        </div>
        <div class="card">
            <form action="{{ route('profile.update') }}" method="Get" enctype="multipart/form-data">
                @csrf
                {{-- @method('PATCH') --}}
                <div class="grid">
                    <div class="card">
                        <div class="grid grid-cols-1">
                            <div class="card">
                                <label for="Pic" class="label">Picture</label>
                                <img src="{{ asset('storage/'.$user->profile_picture)?? asset('images/Profile/Profile.jpg') }}" alt="Profile Picture" class="">
                                @if(Auth::user()->user_id == $user->user_id )
                                <input type="file" name="Pic" id="Pic" autocomplete="given-name"  value="{{ asset('storage/'.$user->profile_picture)}}" >
                                @endif
                            </div>
                            <div class="card">
                                <label for="first_name" class="label">First name</label>
                                @if(Auth::user()->user_id == $user->user_id )
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" value="{{ $user->first_name }}">
                                @else
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" value="{{ $user->first_name }}" disabled>
                                @endif
                            </div>

                            <div class="card">
                                <label for="last_name" class="label">Last name</label>
                                @if(Auth::user()->user_id == $user->user_id )
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" value="{{ $user->last_name }}">
                                @else
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" value="{{ $user->last_name }}" disabled>
                                @endif
                            </div>

                            <div class="card">
                                <label for="email" class="label">Email address</label>
                                @if(Auth::user()->user_id == $user->user_id )
                                <input type="text" name="email" id="email" autocomplete="email" value="{{ $user->email }}">
                                @else
                                <input type="text" name="email" id="email" autocomplete="email" value="{{ $user->email }}" disabled>
                                @endif
                            </div>

                            <div class="card">
                                <label for="specialties" class="label">Specialties</label>
                                @if(Auth::user()->user_id == $user->user_id )
                                <input type="text" name="specialties" id="specialties" value="{{ $user->specialties }}">
                                @else
                                <input type="text" name="specialties" id="specialties" value="{{ $user->specialties }}" disabled>
                                @endif
                            </div>

                            <div class="card">
                                <label for="bio" class="label">Bio</label>
                                @if(Auth::user()->user_id == $user->user_id )
                                <textarea id="bio" name="bio" rows="3" placeholder="Tell us about your experience and practice">{{ $user->bio }}</textarea>
                                @else
                                <textarea id="bio" name="bio" rows="3" placeholder="Tell us about your experience and practice" disabled>{{ $user->bio }}</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                     @if(Auth::user()->user_id == $user->user_id )
                    <div class="card">

                        <button type="submit">
                            Save
                        </button>
                    </div>
                    @endif

                </div>
            </form>
        </div>

        <div class="divider"></div>

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="md:col-span-1">
                <div class="card">
                    <h3>Practitioner Statistics</h3>
                    <p>
                        Overview of your activity on the platform.
                    </p>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="card">
                    <dl class="stats">
                        <div class="stat">
                            <dt>Total Remedies</dt>
                            <dd>{{ $remedies->count() }}</dd>
                        </div>
                        <div class="stat">
                            <dt>Total Herbs</dt>
                            <dd>{{ $herbs->count() }}</dd>
                        </div>
                        <div class="stat">
                            <dt>Total Articles</dt>
                            <dd>{{ $articles->count() }}</dd>
                        </div>
                        <div class="stat">
                            <dt>Member Since</dt>
                            <dd>{{ auth()->user()->created_at->format('F Y') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="md:col-span-1">
                <div class="card">
                    <h3>Your Posts</h3>
                    <p>
                        Overview of your activity, including remedies, herbs, and articles.
                    </p>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="card">

                    <div class="card">
                        <h3>Remedies and Related Herbs</h3>
                        <div class="grid grid-cols-1">
                            @foreach ($remedies as $remedy)
                                <div class="card">
                                    <h4>{{ $remedy->title }}</h4>
                                    <p>Ailment: {{ $remedy->ailment }}</p>
                                    <p>
                                        Preparation: {{ Str::limit($remedy->preparation_steps, 100) }}
                                    </p>
                                    <p>Herbs Used:</p>
                                    <ul>
                                        @foreach ($remedy->herbs as $herb)
                                            <li>{{ $herb->local_name }} ({{ $herb->scientific_name ?? 'N/A' }})</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <h3>Articles</h3>
                        <div class="grid grid-cols-1">
                            @foreach ($articles as $article)
                                <div class="card">
                                    <h4>{{ $article->title }}</h4>
                                    <textarea disabled>
                                        {{ Str::limit($article->content, 100) }}
                                    </textarea>

                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

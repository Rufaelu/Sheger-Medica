<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    h1 {
        text-align: center;
        color: #1F2937;
        font-size: 1.875rem;
        margin-bottom: 20px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #3b82f6;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        margin-bottom: 30px;
    }

    button:hover {
        background-color: #2563eb;
    }

    form {
        margin-top: 30px;
    }

    h2 {
        font-size: 1.25rem;
        color: #1F2937;
        margin-bottom: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #4B5563;
    }

    input[type="text"], input[type="file"], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #D1D5DB;
        border-radius: 6px;
        font-size: 1rem;
        margin-bottom: 10px;
        box-sizing: border-box;
        background-color: #F9FAFB;
    }

    textarea {
        resize: vertical;
        min-height: 150px;
    }

    button[type="submit"] {
        background-color: #10B981;
        font-size: 1.125rem;
        padding: 15px;
    }

    button[type="submit"]:hover {
        background-color: #059669;
    }

    .toggle-btn {
        background-color: #3b82f6;
        padding: 12px;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        width: auto;
        margin-right: 10px;
    }

    .toggle-btn:hover {
        background-color: #2563eb;
    }

    .toggle-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

</style>

<body>
    <x-navbar/>
    <div class="container">
        <h1>Create New Post</h1>

        <!-- Toggle Buttons -->
        <div class="toggle-container">
            <button id="toggleHerb" class="toggle-btn">Herb Form</button>
            <button id="toggleRemedy" class="toggle-btn">Remedy Form</button>
            <button id="toggleArticle" class="toggle-btn">Article Form</button>
        </div>

        <!-- Herb Form -->
        <form id="herbForm" action="{{ route('herbs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Post a Herb</h2>
            <div class="form-group">
                <label for="local_name">Local Name*:</label>
                <input type="text" id="local_name" name="local_name" required>
            </div>
            <div class="form-group">

                <input type="hidden" name="posted_by" value="{{ Auth::user()->user_id }}">
            </div>
            <div class="form-group">
                <label for="scientific_name">Scientific Name:</label>
                <input type="text" id="scientific_name" name="scientific_name">
            </div>
            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" id="region" name="region">
            </div>
            <div class="form-group">
                <label for="benefits">Benefits*:</label>
                <textarea id="benefits" name="benefits" required></textarea>
            </div>
            <div class="form-group">
                <label for="risks">Risks:</label>
                <textarea id="risks" name="risks"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit">Submit Herb</button>
        </form>

        <!-- Remedy Form -->
        <form id="remedyForm" action="{{ route('remedies.store') }}" method="POST" style="display: none;">
            @csrf
            <h2>Post a Remedy</h2>
            <div class="form-group">
                <label for="title">Title*:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="posted_by" value="{{ Auth::user()->user_id }}">
            </div>
            <div class="form-group">
                <label for="herb_ids">Select Herbs*:</label>
                <select id="herb_ids" name="herb_ids[]" multiple required>
                    @foreach($herbs as $herb)
                        <option value="{{ $herb->herb_id }}">{{ $herb->local_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="preparation_steps">Preparation Steps*:</label>
                <textarea id="preparation_steps" name="preparation_steps" required></textarea>
            </div>
            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <input type="text" id="dosage" name="dosage">
            </div>
            <div class="form-group">
                <label for="ailment">Ailment*:</label>
                <input type="text" id="ailment" name="ailment" required>
            </div>
            <button type="submit">Submit Remedy</button>
        </form>

        <!-- Article Form -->
        <form id="articleForm" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" style="display: none;">
            @csrf
            <h2>Post an Article</h2>
            <div class="form-group">
                <label for="article_title">Title*:</label>
                <input type="text" id="article_title" name="title" required>
            </div>
            <div class="form-group">
                <label for="article_content">Content*:</label>
                <textarea id="article_content" name="content" required></textarea>
            </div>



            <button type="submit">Submit Article</button>
        </form>
    </div>

    <script>
        const toggleHerbBtn = document.getElementById('toggleHerb');
        const toggleRemedyBtn = document.getElementById('toggleRemedy');
        const toggleArticleBtn = document.getElementById('toggleArticle');
        const herbForm = document.getElementById('herbForm');
        const remedyForm = document.getElementById('remedyForm');
        const articleForm = document.getElementById('articleForm');

        function showForm(formToShow) {
            [herbForm, remedyForm, articleForm].forEach(form => {
                form.style.display = 'none';
            });
            formToShow.style.display = 'block';
        }

        toggleHerbBtn.addEventListener('click', () => showForm(herbForm));
        toggleRemedyBtn.addEventListener('click', () => showForm(remedyForm));
        toggleArticleBtn.addEventListener('click', () => showForm(articleForm));

        // Initially show the herb form
        showForm(herbForm);
    </script>
</body>

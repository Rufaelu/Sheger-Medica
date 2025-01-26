<!-- resources/views/herbs/edit.blade.php -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Herb</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="file"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .current-image {
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Herb</h1>

        <form action="{{ route('herbs.update', $herb->herb_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="local_name">Local Name*:</label>
                <input type="text" id="local_name" name="local_name" value="{{ $herb->local_name }}" required>
            </div>

            <div class="form-group">
                <label for="scientific_name">Scientific Name:</label>
                <input type="text" id="scientific_name" name="scientific_name" value="{{ $herb->scientific_name }}">
            </div>

            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" id="region" name="region" value="{{ $herb->region }}">
            </div>

            <div class="form-group">
                <label for="benefits">Benefits*:</label>
                <textarea id="benefits" name="benefits" required>{{ $herb->benefits }}</textarea>
            </div>

            <div class="form-group">
                <label for="risks">Risks:</label>
                <textarea id="risks" name="risks">{{ $herb->risks }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
                @if($herb->image_path)
                    <p>Current image:</p>
                    <img src="{{ asset('storage/' . $herb->image_path) }}" alt="{{ $herb->local_name }}" class="current-image">
                @endif
            </div>

            <button type="submit">Update Herb</button>
        </form>
    </div>
</body>


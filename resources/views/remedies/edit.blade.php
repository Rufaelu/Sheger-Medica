<!-- resources/views/remedies/edit.blade.php -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Remedy</title>
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
        input[type="text"], textarea, select {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Remedy</h1>

        <form action="{{ route('remedies.update', $remedy->remedy_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title*:</label>
                <input type="text" id="title" name="title" value="{{ $remedy->title }}" required>
            </div>

            <div class="form-group">
                <label for="herb_id">Herb*:</label>
                <select id="herb_id" name="herb_id" required>
                    @foreach($herbs as $herb)
                        <option value="{{ $herb->herb_id }}" {{ $remedy->herb_id == $herb->herb_id ? 'selected' : '' }}>
                            {{ $herb->local_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="preparation_steps">Preparation Steps*:</label>
                <textarea id="preparation_steps" name="preparation_steps" required>{{ $remedy->preparation_steps }}</textarea>
            </div>

            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <input type="text" id="dosage" name="dosage" value="{{ $remedy->dosage }}">
            </div>

            <div class="form-group">
                <label for="ailment">Ailment*:</label>
                <input type="text" id="ailment" name="ailment" value="{{ $remedy->ailment }}" required>
            </div>

            <button type="submit">Update Remedy</button>
        </form>
    </div>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practitioner Application Review</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            /*background-color: white;*/
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            --input-focus: #2d8cf0;
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --bg-color-alt: #666;
            --main-color: #323232;
            background-color: var(--bg-color);
            /*margin-left: 38vw;*/
            /*width:10vw;*/
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .application {
            /*background-color: rgba(187, 187, 187, 0.6);*/
            background-color: lightgray;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(56, 50, 50, 0.1);
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .field-value {
            /*background-color: #fff;*/
            padding: 10px;
            outline: none;
            color: var(--font-color);

            /*border: 1px solid #ddd;*/
            border: 5px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
        }
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .image-gallery img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 0 10px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            color: var(--font-color);

        }
        button:active{
            box-shadow:   0px var(--main-color);
            transform: translate(3px, 3px);
        }
        #approveBtn {
            background-color: #2ecc71;
            color: white;
        }
        #rejectBtn {
            background-color: #e74c3c;
            color: white;
        }
        #approveBtn:hover {
            background-color: #27ae60;
        }
        #rejectBtn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<h1>Practitioner Application Review</h1>
<div id="applicationContainer" class="application">
    <div class="field">
        <div class="field-label">User ID:</div>
        <div class="field-value">{{$user->user_id}}</div>
    </div>
    <div class="field">
        <div class="field-label">Name:</div>
        <div class="field-value">{{$user->first_name .' '. $user->last_name}}</div>
    </div>
    <div class="field">
        <div class="field-label">Email:</div>
        <div class="field-value">{{$user->email}}</div>
    </div>
    <div class="field">
        <div class="field-label">Specialty:</div>
        <div class="field-value">{{$user->speciality}}</div>
    </div>
    <div class="field">
{{--        <div style="width: 100%; height: 600px; border: 1px solid #ccc; overflow: auto;">--}}
{{--            <iframe--}}
{{--                src="{{ asset('path/to/your/file.pdf') }}"--}}
{{--                style="width: 100%; height: 100%;"--}}
{{--                frameborder="0">--}}
{{--                This browser does not support PDFs. Please download the PDF to view it:--}}
{{--                <a href="{{ asset('path/to/your/file.pdf') }}">Download PDF</a>--}}
{{--            </iframe>--}}
{{--        </div>--}}
    </div>
    <div class="button-group">
        <button id="approveBtn">Approve</button>
        <button id="rejectBtn">Reject</button>
    </div></div>

<script>
    // Simulated data retrieval from database



</script>
</body>
</html>

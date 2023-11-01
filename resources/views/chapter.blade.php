@props(['chapters','chapter','prev','next',"indexes"])

<x-navbar />

<html>
<head>
    <title>{{$chapter->chapter_name}}</title>
    <style>


        .chapter {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .chapter h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .chapter p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="chapter">
        <h1>{{$chapter['chapter_name']}}</h1>
        <p>
            {!!$chapter['chapter']!!}
        </p>
    </div>
    {{-- {{$prev}}   {{$next}} --}}
    <x-chapterNav :chapters="$chapters" :chapter="$chapter" :prev="$prev" :next="$next" :indexes="$indexes"/>
</body>
</html>

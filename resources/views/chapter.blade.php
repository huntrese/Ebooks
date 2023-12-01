@props(['chapters','chapter','prev','next',"indexes"])

<x-navbar />

<head>
    <title>{{$chapter->chapter_name}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

</head>
<body>

    <div class="chapter">
        <h1>{{$chapter['chapter_name']}}</h1>
        <p>
            {!!$chapter['chapter']!!}
        </p>
    </div>
    <x-chapterNav :chapters="$chapters" :chapter="$chapter" :prev="$prev" :next="$next" :indexes="$indexes"/>
</body>


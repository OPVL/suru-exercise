<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            <button type="submit">save</button>
        </form>
        @if ($lastAdded)
            <div class="last-created">{{ $lastAdded }}</div>
        @endif
        @foreach ($notes as $note)
            <div class="note-card">
                <h4>{{ $note->content }}</h4>
                <p><i>{{ $note->displayDate }}</i>
                </p>
            </div>
        @endforeach
    </div>
</body>

</html>

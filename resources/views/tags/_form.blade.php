@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" value="{{ old('name', $tag->name ?? '') }}" required>
</p>

<button type="submit">Save</button>
<a href="{{ route('tags.index') }}">Cancel</a>

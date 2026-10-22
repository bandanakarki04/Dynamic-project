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
    <input type="text" id="name" name="name" value="{{ old('name', $kpi->name ?? '') }}" required>
</p>

<p>
    <label for="description">Description (how it is measured)</label><br>
    <textarea id="description" name="description" rows="4" cols="50">{{ old('description', $kpi->description ?? '') }}</textarea>
</p>

<button type="submit">Save</button>
<a href="{{ route('kpis.index') }}">Cancel</a>

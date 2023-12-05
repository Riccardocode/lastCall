@props(['busines'])
{{-- !to check if it works  --}}
<a href="/business/{id}">
    <article>
        <h3>{{$busines->name}} </h3>
        <div>
            {{-- !to fix --}}
            <img src="{{$busines->image}}" alt="restaurant">
        </div>
    </article>
</a>
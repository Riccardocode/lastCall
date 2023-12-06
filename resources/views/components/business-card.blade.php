@props(['business'])
{{-- !to check if it works  --}}
<a href="/business/{{$business->id}}/produtcs">
    <article>
        <h3>{{$business->name}} </h3>
        <div>
            {{-- !to fix --}}
            <img src="{{$business->image}}" alt="restaurant">
        </div>
    </article>
</a>
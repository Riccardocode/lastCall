{{-- Search --}}
@props(['categories'])
<form id="chooSearch" class="reveal animationScale" action="/choosing" method="GET">
    <input type="text" placeholder="Search" name="search">
    <select name="category" id="">
        {{-- !back-end again, your time to shine here we need to show every business in this selction --}}
        <option value="">Select a category</option>
        @foreach ($categories as $category)
            
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        {{-- @foreach ($collection as $item)
            <option value=""></option>
        @endforeach --}}
    </select>
    <select name="" id="">
        <option value="">By Rating</option>
        {{-- !back-end again, your time to shine here we need to show every business in this selction --}}
        {{-- @foreach ($collection as $item)
            <option value=""></option>
        @endforeach --}}
    </select>
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
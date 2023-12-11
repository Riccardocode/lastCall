{{-- Search --}}
<form id="chooSearch" class="reveal animationScale" action="#">
    <input type="text" placeholder="Search">
    <select name="" id="">
        {{-- !back-end again, your time to shine here we need to show every business in this selction --}}
        <option value="">By Category</option>
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
    <button><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
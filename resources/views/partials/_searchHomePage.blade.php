{{-- Search --}}
<form id="homeSearch" action="/business2km" method="POST">
    @csrf
    <input type="text" name="address" placeholder="Search by location">
    <button type="submit"><i class="fa-solid fa-location-arrow fa-xl"></i></button>
</form>

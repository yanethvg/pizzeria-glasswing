<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
    src="https://uybor.uz/borless/uybor/img/user-images/user_no_photo_300x300.png" alt="User Image" width="50" >
<div>
    <p class="app-sidebar__user-name">{{ Auth::user()->username }}</p>
    <p class="app-sidebar__user-designation">{{ Auth::user()->name }}</p>
</div>
</div>
<ul class="app-menu">
<li><a class="app-menu__item {{isActive('home')}} " href="{{route('home')}}">
    <img src="{{ asset('images/home.svg') }}" alt="" width="25px"> &nbsp;
    <span class="app-menu__label">Home</span></a></li>
<li><a class="app-menu__item " href="">
    <img src="{{ asset('images/pizza2.svg') }}" alt="" width="25px">&nbsp;
    <span class="app-menu__label">Pizzas</span></a></li>
<li><a class="app-menu__item {{isActive('ingredients')}}" href="{{route('ingredients.index')}}">
    <img src="{{ asset('images/cheese.svg') }}" alt="" width="25px"> &nbsp;
    <span class="app-menu__label">Ingredientes</span></a></li>
</ul>

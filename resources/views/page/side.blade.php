<div class="sidebar">

    <input type="checkbox" id="toggle">
    <label for="toggle" class="label-menu">Menu</label>
    <nav>
        <ul>
            <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a></li>
            <li><a class="{{ request()->is('customers*') ? 'active' : ''}}" href="{{ route('customers.index') }}">Клиенты</a></li>
            <li><a class="{{ request()->is('tour*') ? 'active' : ''}}" href="{{ route('tour') }}">Туры</a></li>
            <li><a class="{{ request()->is('application*') ? 'active' : '' }}" href="{{ route('application') }}">Заявка</a></li>
        </ul>

            @can('isAdmin')

            <ul>
                <li><a href="#">Админ панель</a></li>
                <li><a  href="{{route('admin-tour.index')}}">Туры</a></li>
            </ul>

            @endcan

    </nav>



</div>























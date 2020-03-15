
<div class="sidebar">

        <input type="checkbox" id="toggle">
        <label for="toggle" class="label-menu">Menu</label>
        <nav>
            <ul>
                <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a></li>
                <li><a class="{{ request()->is('customers*') ? 'active' : ''}}" href="{{ route('customers.index') }}">Клиенты</a></li>
                <li><a href="#">Заявки</a></li>
                <li><a href="#">Туры</a></li>
                <li><a href="#">Админ панель</a></li>
            </ul>
        </nav>


</div>























<header>

    <div class="header">
        <div id="time" style="color: white; margin-right: 50px"></div>

        <div>
            <img src="/uploads/avatars/{{ Auth::user()->account->avatar ?? 'default.jpg'}}" alt="avatar" style="width: 32px; height: 32px; border-radius: 50%;">
{{--            <img src="/uploads/avatars/{{ $user->account->avatar ?? 'default.jpg'}}" alt="avatar" style="width: 32px; height: 32px; border-radius: 50%;">--}}
        </div>

        <div class="dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.index') }}">Profile <span><i class="fas fa-male"></i></span></a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} <span><i class="fas fa-sign-out-alt"></i></span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>

        </div>


    </div>
</header>






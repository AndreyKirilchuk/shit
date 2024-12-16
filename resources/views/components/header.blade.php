<div class="header_container">
    <div class="container">
        <header>
            <div class="logo">
                Нарушителям.Нет
            </div>

            <nav>
                <a href="/make_applications">Оставить заявку</a>
                <a href="/">Мои заявки</a>
                @if(Auth::check() && Auth::user()->level == 'admin')
                    <a href="/admin_panel">Админ панель</a>
                @endif

                <a href="/logout">
                    <button>
                        Выйти
                    </button>
                </a>
            </nav>
        </header>
    </div>
</div>

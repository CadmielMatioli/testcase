<aside>

    <a href="{{ route('users.index') }}" class="mx-auto ">
        <x-application-logo fill="white" />
    </a>


    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="menu-sidbar">

            @can('view_users')
                <a href="{{ route('users.index') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="mx-4 font-medium">Usuários</span>
                </a>
            @endcan
            <hr class="my-6 border-gray-200" />
        </nav>

    </div>
    <div class="text-white text-xs">
        <span>Versão: 1.0.05 </span>
    </div>
</aside>

<x-app-layout>

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800 ">Visualizar usuário {{$user->name}}</h2>

        <div class="flex items-center py-4 overflow-x-auto whitespace-nowrap">

            <a href="{{ route('users.create') }}" class="text-gray-600 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

            <span class="mx-1 text-gray-500  rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd" />
                </svg>
            </span>

            <a href="{{ route('users.index') }}" class="text-gray-600">
                Usuário
            </a>

            <span class="mx-1 text-gray-500  rtl:-scale-x-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-gray-800 font-bold">
                Visualizar usuário
            </a>
        </div>
    </div>

    <section>
        <div class="grid grid-cols-12 gap-6 mt-4 py-5 items-center">

            <div class="col-span-12 sm:col-span-4">
              <img class="rounded-full w-24 h-24" src="{{asset('storage/'.$user->img)}}" alt="imagem">
            </div>
            <div class="col-span-12 sm:col-span-4">
                @if($user->is_admin)
                    <span class="text-sm text-gray-50 font-extrabold bg-red-600 p-2 rounded-lg">Admin</span>
                @else
                    <span class="text-sm text-gray-50 font-extrabold bg-green-600 p-2 rounded-lg">Aluno</span>
                @endif
            </div>
            <div class="col-span-12 sm:col-span-4">
                @if($user->status)
                    <span class="text-sm text-gray-50 font-extrabold bg-green-600 p-2 rounded-lg">Ativo</span>
                @else
                    <span class="text-sm text-gray-50 font-extrabold bg-red-600 p-2 rounded-lg">Inativo</span>
                @endif
            </div>

            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input disabled id="name" class="block mt-1 w-full" type="text" name="name"
                              :value="old('name') ?? $user->name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input disabled id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email') ?? $user->email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4">
                <label for="type">
                    <span class="text-sm font-medium text-gray-900">Salas</span>
                    <select disabled name="class_room" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm form-control w-full" id="type" name="quantity">
                        <option value="" selected>Selecione a sala</option>
                        @foreach($classRooms as $classRoom)
                            <option value="{{ $classRoom->id}}" {{$user->classRoom->id == $classRoom->id ? 'selected' : '' }} >{{ $classRoom->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>

    </section>

</x-app-layout>

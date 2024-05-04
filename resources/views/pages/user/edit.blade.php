<x-app-layout>

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800 ">Editar usuário {{$user->name}}</h2>

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
                Editar usuário
            </a>
        </div>
    </div>

    <section>
        <form action="{{ route("users.update", ["user" => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-12 gap-6 mt-4 py-5 items-center">
                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3">
                    <x-input-label for="file" :value="__('file')" />
                    <x-text-input id="file" class="block mt-1 w-full" type="file" name="img" :value="old('img')" />
                    <x-input-error :messages="$errors->get('img')" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                  :value="old('name') ?? $user->name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                  :value="old('email') ?? $user->email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3">
                    <label for="type">
                        <span class="text-sm font-medium text-gray-900">Salas</span>
                        <select name="class_room" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm form-control w-full" id="type" name="quantity">
                            <option value="" selected>Selecione a sala</option>
                            @foreach($classRooms as $classRoom)
                                <option value="{{ $classRoom->id}}" {{$user->classRoom->id == $classRoom->id ? 'selected' : '' }} >{{ $classRoom->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-span-6">

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" {{$user->is_admin ? 'checked' : ''}} name="is_admin" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</span>
                    </label>

                </div>
                <div class="col-span-6">

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" {{$user->status ? 'checked' : ''}} name="status" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                    </label>

                </div>
            </div>

            <div class="flex justify-between mt-6">
                <x-button href="{{ route('users.index') }}" type="submit" bgColor="bg-red-700"  textColor="text-gray-100"  title="Voltar"  icon="fas fa-share mr-2"></x-button>
                <x-button type="submit" bgColor="bg-green-700"  textColor="text-gray-100"  title="Salvar"  icon="fas fa-check mr-2"></x-button>
            </div>

        </form>
    </section>

</x-app-layout>

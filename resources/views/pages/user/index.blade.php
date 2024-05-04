<x-app-layout>
    <section class="mx-auto">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-800 ">Usuários</h2>
            <a href="{{ route('users.create') }}">
                <x-button bgColor="bg-gray-300"
                          textColor="text-gray-700"
                          title="Novo usuário"
                          icon="fas fa-user-plus"
                          href="{{route('users.create')}}">
                    <span>Novo usuário</span>
                </x-button>
            </a>
        </div>

        <div class="my-5 w-full">
            <form action="{{ route('users.index') }}" class="w-full flex space-x-2">
                <x-text-input class="w-4/12" name="name" placeholder="Filtrar por nome"/>
                <x-button bgColor="bg-gray-300" icon="fas fa-search" title="Filtrar" />
            </form>
        </div>
        <div class="my-5 w-full">
            <form method="POST" action="{{ route('users.import') }}" class="w-full flex space-x-2"  enctype="multipart/form-data">
                @csrf
                <input type="file" accept="csv" class="w-3/12" name="file" placeholder="enviar arquivo"/>
                <button type="submit" class="px-2 py-2 border border-transparent rounded-md font-semibold tracking-widest bg-gray-300 text-gray-700 w-1/12" name="name">
                    <i class="fas fa-file-csv mx-1"></i> Enviar
                </button>
            </form>
        </div>
    </section>
    <div class="mt-6">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden border border-gray-200  md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Turma</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        @if($user->img)
                                            <img class="m-auto rounded-full w-16 h-16" src="{{asset('storage/'. $user->img)}}" alt="img">
                                        @else
                                            Sem imagem
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td class="p-2">
                                        {{$user->email}}
                                    </td>
                                    <td class="p-2">
                                        {{$user->status ? 'Ativo' : 'Inativo'}}
                                    </td>
                                    <td class="p-2">
                                        {{$user->is_admin ? 'Administrador' : 'Aluno'}}
                                    </td>
                                    <td class="p-2">
                                        {{$user->classRoom?->name ? $user->classRoom->name : 'Sem turma'}}
                                    </td>
                                    <td class="flex justify-center p-2">
                                        <a class="inline-flex text-white items-center px-4 py-2 mx-1 bg-blue-600 text-xs border border-transparent rounded-md font-semibold tracking-widest" href="{{ route('users.show', $user->id) }}">
                                            <i class="fas fa-eye mx-1"></i>
                                            Visualizar
                                        </a>
                                        <a class="inline-flex text-white items-center px-4 py-2 mx-1 bg-gray-600 text-xs border border-transparent rounded-md font-semibold tracking-widest" href="{{ route('users.edit', $user->id) }}">
                                            <i class="fas fa-edit mx-1"></i>
                                            Editar
                                        </a>
                                        <button
                                            type="button"
                                            data-url="{{ route('users.remove', $user->id) }}"
                                            data-user="{{$user}}"
                                            class="inline-flex text-white items-center px-4 py-2 mx-1 bg-red-600 text-xs border border-transparent rounded-md font-semibold tracking-widest delete"
                                        >
                                            <i class="far fa-trash-alt mx-1"></i>
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                    <div class="mt-6 flex items-center justify-end">
                        {{ $users->appends(['per_page' => request('per_page')])->links() }}
                    </div>
            </div>
        </div>
    </div>
    @include('components.delete')
    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                initializeModal({
                    modalId: 'interest-modal',
                    appIdElement: 'app-id',
                    buttonElement: 'button-delete',
                    formSelector: 'remove-record-model-delete',
                    querySelector: 'delete',
                    nameDivModal: 'nameDivModal'
                });
            });
        </script>
    @endsection
</x-app-layout>

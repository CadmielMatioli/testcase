<?php
    namespace App\Http\Controllers;


use App\Http\Requests\User\RequestStore;
use App\Http\Requests\User\RequestUpdate;
use App\Models\User;
use App\Services\ClassRoomService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller{

    private UserService $userService;
    private ClassRoomService $classRoomService;
    public function __construct()
    {
        $this->userService = new UserService();
        $this->classRoomService = new ClassRoomService();
    }

    public function index() {
        $users = $this->userService->index();
        return view('pages.user.index', compact('users'));
    }

    public function show(User $user){
        $classRooms = $this->classRoomService->index();
        return view('pages.user.show', compact('user', 'classRooms'));
    }

    public function create(){
        $classRooms = $this->classRoomService->index();
        return view('pages.user.create', compact('classRooms'));
    }

    public function store(RequestStore $request){
        $this->userService->create($request);
        return redirect()->route('users.index')->with('success', __('messages.user.success.store'));
    }

    public function edit(User $user){
        $classRooms = $this->classRoomService->index();
        return view('pages.user.edit', compact('user', 'classRooms'));
    }

    public function update(RequestUpdate $request, User $user)
    {
        $updateResult = $this->userService->update(
            $request->only(["name", "email", "class_room", "is_admin", "status", "img"]),
            $user
        );

        if ($updateResult) {
            return redirect()->route('users.index')->with(["success" => "Registro atualizado com sucesso."], Response::HTTP_OK);
        }
        return redirect()->route('users.index')->with(["error" => "Não foi possível atualizar o registro do banco de dados."], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(User $user)
    {
        if ($this->userService->delete($user)) {
            return redirect()->route('users.index')->with(["success" => "Registro removido com sucesso."], Response::HTTP_OK);
        } else {
            return redirect()->route('users.index')->with(["error" => "Não foi possível remover o registro do banco de dados."], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function import(Request $request)
    {
        if($this->userService->importCsv($request)){
            return redirect()->route('users.index')->with(["success" => "Arquivo enviado com sucesso!"], Response::HTTP_OK);
        }
        return redirect()->route('users.index')->with(["error" => "Selecione um arquivo!."], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\SortBy;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersList extends Component
{
    use WithPagination, SortBy;
    protected $paginationTheme = 'bootstrap';
    protected $listeners       = ['deleteUser'];
    protected $queryString     = [
        'search' => ['except' => ''],
        'page',
    ];
    public $perPage        = 10;
    public $search         = '';
    public $orderBy        = 'id';
    public $orderAsc       = true;
    public $verificado         = 1;
    public $user_id        = '';
    public $rol        = '';
    public $findrole        = '';
    public $roles        = [];
    public $editMode       = false;
    public $creatingMode   = false;
    // VARIABLES DE USUARIO
    public $nombre, $email, $username;
    public function render()
    {
        $users = User::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.admin.user.users-list', compact('users'));
    }
    public function createUser()
    {
        $this->validate([
            'nombre'   => 'required',
            'email'    => 'required|unique:usuarios,email|email',
        ], [
            'nombre.required'   => 'No has agregado el nombre del usuario',
            'email.required'     => 'No has agregado el correo',
            'email.email'        => 'Agrega un correo valido',
            'email.unique'       => 'Este correo ya se encuentra en uso',
        ]);
        // $clave = Str::random(10); // PRODUCTION
        $clave              = 12345678; //LOCAL
        $user               = new User;
        $user->nombre      = $this->nombre;
        $user->username     = $this->username;
        $user->email        = $this->email;
        $user->verificado       = $this->verificado == 'activo' ? 'activo' : 'inactivo';
        $user->password     = Hash::make($clave);
        $user->save();
        $this->resetInput();
        $this->alert(
            'success',
            'Usuario Registrado Correctamente',
            [
                'modal' => '#userModal'
            ]
        );
    }
    public function editUser(User $user)
    {
        $this->user_id  = $user->id;
        $this->nombre    = $user->nombre;
        $this->email    = $user->email;
        $this->verificado   = $user->verificado;
        $this->editMode = true;
    }
    public function updateUser()
    {
        $this->validate([
            'nombre'   => 'required',
            'email'    => 'required|unique:usuarios,email,' . $this->user_id,
        ], [
            'nombre.required'   => 'No has agregado el nombre del usuario',
            'email.required'     => 'No has agregado el correo',
            'email.email'        => 'Agrega un correo valido',
            'email.unique'       => 'Este correo ya se encuentra en uso',
        ]);
        $user           = User::find($this->user_id);
        $user->nombre      = $this->nombre;
        $user->email        = $this->email;
        $user->verificado       = $this->verificado;
        $user->save();
        $this->resetInput();
        $this->alert(
            'info',
            'Usuario Actualizado Correctamente',
            [
                'modal' => '#userModal'
            ]
        );
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        $this->alert(
            'info',
            'Usuario Eliminado Correctamente',
            [
                'modal' => '#userModal'
            ]
        );
    }
    public function resetInput()
    {
        $this->reset([
            'nombre', 'username', 'email', 'verificado', 'editMode'
        ]);
    }
}

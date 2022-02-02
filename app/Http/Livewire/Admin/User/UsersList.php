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
    /**
     * Elegir el tipo de paginación
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';
    /**
     * Variable para escuchar eventos.
     *
     * @var array
     */
    protected $listeners  = ['deleteUser'];
    /**
     * Parametros en la url
     *
     * @var array
     */
    protected $queryString     = [
        'search' => ['except' => ''],
        'page',
    ];
    /**
     * Cantidad de registros por paginas a mostrar.
     *
     * @var integer
     */
    public $perPage        = 10;
    /**
     * Buscar entre los registros de las transacciones
     *
     * @var string
     */
    public $search         = '';
    /**
     * Ordenar los registros segun la columna.
     *
     * @var string
     */
    public $orderBy        = 'id';
    /**
     * Ordenar de manera ascendente o descendente
     *
     * @var boolean
     */
    public $orderAsc       = true;
    /**
     *Estado del usuario
     *
     * @var boolean
     */
    public $verificado         = 1;
    /**
     * Id del usuario que se utiliza al editar
     *
     * @var string
     */
    public $user_id        = '';
    /**
     * Modo de edicion
     *
     * @var boolean
     */
    public $editMode       = false;
    /**
     * Nombre del usuario
     *
     * @var string
     */
    public $nombre;
    /**
     * Email del usuario
     *
     * @var string
     */
    public  $email;
    /**
     * Renderizar el componete con las listas de usuarios
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $users = User::whereNotIn('id', [1])
            ->search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.admin.user.users-list', compact('users'));
    }
    /**
     * Funcion para crear un usuario nuevo
     *
     * @return void
     */
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
        $user->email        = $this->email;
        $user->verificado       = $this->verificado;
        $user->admin       = 0;
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
    /**
     * Funcion para obtener los datos de un usuario para su edicion
     *
     * @param User $user
     * @return void
     */
    public function editUser(User $user)
    {
        $this->user_id  = $user->id;
        $this->nombre    = $user->nombre;
        $this->email    = $user->email;
        $this->verificado   = $user->verificado;
        $this->editMode = true;
    }
    /**
     * Funcion para actualizar un usuario.
     *
     * @return void
     */
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
    /**
     * Funcion para eliminar un usuario.
     *
     * @param User $user
     * @return void
     */
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
    /**
     * Funcion para restablecer los inputs del modal
     *
     * @return void
     */
    public function resetInput()
    {
        $this->reset([
            'nombre', 'email', 'verificado', 'editMode'
        ]);
    }
}

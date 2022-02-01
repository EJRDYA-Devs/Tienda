<!-- Vertically Center -->
<div wire:ignore.self class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                @if ($editMode)
                    <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Actualizar Usuario</h5>
                @else
                    <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Crear Usuario</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="resetInput">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center text-dark font-weight-bold">DATOS GENERALES</h3>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold text-dark" for="inputAddress">Nombres</label>
                        <input type="text" wire:model.defer="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombres y Apellidos">
                        @error('nombre')
                            <p class="error-message text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold text-dark" for="inputPassword4">Correo</label>
                        <input type="email" wire:model.defer="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electronico">
                        @error('email')
                            <p class="error-message text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="selectgroup selectgroup-pills">
                    <span class="font-weight-bold text-dark"> Estado:</span>
                    <label class="selectgroup-item">
                        <input type="radio" wire:model="verificado" name="verificado" value="1"
                            class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-toggle-on"></i></span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" wire:model="verificado" name="verificado" value="0"
                            class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon"><i
                                class="fas fa-toggle-off"></i></span>
                    </label>
                    <span class="badge @if ($verificado == 'activo') badge-success @else badge-danger @endif">{{ $verificado }}</span>
                </div>
            </div>
            <div class="modal-footer br">
                @if ($editMode)
                    <button type="button" class="btn btn-warning" wire:target="updateUser,createUser,editUser"
                        wire.loading.attr="disabled" wire:click="updateUser">Actualizar Usuario</button>
                @else
                    <button type="button" class="btn btn-primary" wire:target="updateUser,createUser,editUser"
                        wire.loading.attr="disabled" wire:click="createUser">Crear
                        Usuario</button>
                @endif
            </div>
        </div>
    </div>
</div>

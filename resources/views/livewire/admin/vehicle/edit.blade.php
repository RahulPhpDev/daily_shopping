

{{--
<!-- Modal -->--}}
<div wire:ignore.self id="editModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <x-page-head flag="true" argument='edit'/>
                    <a href="#!" class="red-text float-right modal-action modal-close waves-effect waves-green btn-flat ">x</a>
                </h5>

                </button>
            </div>
            <div class="modal-body">

{{--                'vehicle_type_id',--}}
{{--                'name',--}}
{{--                'number',--}}
{{--                'details',--}}
                <form>
                    <div class="row">
                        <div class="input-field col m6 s6">
                            <label for="edit_name" class="active"> Name</label><br/>
                            <input id="edit_name" type="text" class="validate" wire:model.defer="name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col m4 s12">
                            <div class="input-field col s12">
                                <button wire:click.prevent="update()" class="btn cyan waves-effect waves-light" type="submit"
                                        name="action">
                                    <i class="material-icons left">perm_identity</i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<a class="modal-trigger waves-effect pull-right waves-light btn gradient-45deg-light-blue-cyan z-depth-3 mb-2"
   href="#createModal">Add Brand</a>

{{--
<!-- Modal -->--}}
<div wire:ignore.self id="createModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="row">
                        <div class="input-field col m6 s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix2" type="text" class="validate" wire:model.defer="name">
                            <label for="icon_prefix2" class="active"> Name</label>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-field col m4 s12">
                            <div class="input-field col s12">
                                <button wire:click.prevent="store()" class="btn cyan waves-effect waves-light" type="submit"
                                        name="action">
                                    <i class="material-icons left">perm_identity</i> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

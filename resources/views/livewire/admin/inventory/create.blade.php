<a class="modal-trigger waves-effect pull-right waves-light btn gradient-45deg-light-blue-cyan z-depth-3 mb-2"
   href="#createModal">

    <x-page-head flag="true" argument='create'/>
</a>

{{--
<!-- Modal -->--}}
<div wire:ignore.self id="createModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <x-page-head flag="true" argument='add'/>
                    <a href="javascript:void(0);"
                       class="red-text float-right modal-action modal-close waves-effect waves-green btn-flat ">x</a>
                </h5>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="@if($updateModel) update @else store @endif">
                    <div class="row">

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                class="validate"
                                value="ddd"
                                wire:model.defer="state" >

                            <label
                                for="icon_prefix2"
                                class="active">
                                State
                            </label>

                            @error('state')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                value="dff"
                                class="validate"
                                wire:model.defer="city"/>

                            <label
                                for="icon_prefix2"
                                class="active">
                                City
                            </label>

                            @error('city')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                value="dff"
                                class="validate"
                                wire:model.defer="code">

                            <label
                                for="icon_prefix2"
                                class="active">
                                Code
                            </label>

                            @error('code')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="input-field col m6 s6">
                            <textarea
                                id="icon_prefix2"
                                type="text"
                                class="materialize-textarea"
                                value="dfdsf"
                                wire:model.defer="landmark">
                            </textarea>

                            <label
                                for="icon_prefix2"
                                class="active">
                                Landmark
                            </label>

                            @error('details')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="input-field col m4 s12">
                            <div class="input-field col s12">
                                <button
                                    class="btn cyan waves-effect waves-light"
                                    type="submit"
                                    name="action">
                                    <i class="material-icons left">perm_identity</i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

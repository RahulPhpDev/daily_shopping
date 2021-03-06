

<div wire:ignore.self id="editModal" class="modal  fade in" data-keyboard = "false"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <x-page-head flag="true" argument='edit'/>
                    <a wire:click="resetInputFields" href="javascript:void(0);"
                       class="red-text float-right modal-action modal-close waves-effect waves-green btn-flat ">x</a>
                </h5>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="update">
                    <div class="row">

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                class="validate"
                                value="ddd"
                                wire:model.defer="name" >

                            <label
                                for="icon_prefix2"
                                class="active">
                                Name
                            </label>

                            @error('name')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

{{--                        <div class="input-field col m6 s6">--}}
{{--                            <input--}}
{{--                                id="icon_prefix2"--}}
{{--                                type="email"--}}
{{--                                class="validate"--}}
{{--                                wire:model.defer="email"/>--}}

{{--                            <label--}}
{{--                                for="icon_prefix2"--}}
{{--                                class="active">--}}
{{--                                Email--}}
{{--                            </label>--}}

{{--                            @error('email')--}}
{{--                            <span class="text-danger">--}}
{{--                                    {{ $message }}--}}
{{--                                </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                    </div>

                    <div class="row">

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                value="dff"
                                class="validate"
                                wire:model.defer="phone">

                            <label
                                for="icon_prefix2"
                                class="active">
                                Phone
                            </label>

                            @error('phone')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="input-field col m6 s6">
                            <label
                                for="icon_prefix2"
                                class="active">
                               Role
                            </label>
                            <select
                                class="browser-default"
                                required="true"
                                wire:model.defer="roleId"
                            >
                                @foreach( $roles as $vn => $vt)
                                    <option @if ($vn == $roleId) selected @endif wire:key ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
                                @endforeach
                            </select>

                            @error('roleId')
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
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


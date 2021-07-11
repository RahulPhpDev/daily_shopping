

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

                <form wire:submit.prevent="update">
                    <div class="row">

                        <div class="input-field col m6 s6">



                            <label
                                for="icon_prefix2"
                                class="active">
                                Vehicle Type
                            </label>

                            <select
                                wire:model.defer="vehicle_type_id"
                                class="display-block"
                            >
                                @foreach( $vehicleTypes as $vn => $vt)
                                    <option wire:key ="{{ $vn }}" value ="{{ $vn  }}" @if ( @vn == $vehicle_type_id ) 'selected' @endif >
                                        {{ $vt  }}
                                    </option>
                                @endforeach
                            </select>
{{--                            @error('vehicle_type_id')--}}
{{--                            <span class="text-danger">--}}
{{--                                    {{ $message }}--}}
{{--                                </span>--}}
{{--                            @enderror--}}
                        </div>




                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                class="validate"
                                value="ddd"
                                wire:model.defer="name">

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



                    </div>

                    <div class="row">

                        <div class="input-field col m6 s6">
                            <input
                                id="icon_prefix2"
                                type="text"
                                value="dff"
                                class="validate"
                                wire:model.defer="number">

                            <label
                                for="icon_prefix2"
                                class="active">
                                Vehicle Number
                            </label>

                            @error('number')
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
                                wire:model.defer="details">
                            </textarea>

                            <label
                                for="icon_prefix2"
                                class="active">
                                Details
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
{{--                                    wire:click.prevent="update()"--}}
                                    class="btn cyan waves-effect waves-light" type="submit"
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


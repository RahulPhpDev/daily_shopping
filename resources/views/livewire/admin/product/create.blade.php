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
                </h5>
                </button>
            </div>
            <div class="modal-body">

{{--                'vehicle_type_id',--}}
{{--                'name',--}}
{{--                'number',--}}
{{--                'details',--}}
                <form >
                    <div class="row">

                        <div class="input-field col m6 s6">



                            <label
                                for="icon_prefix2"
                                class="active">
                                Vehicle Type
                            </label>
                            <select
                                wire:model.defer="vehicle_type_id"
                            >
                                @foreach( $vehicleTypes as $vn => $vt)
                                    <option wire:key ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
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
                                    wire:click.prevent="store()"
                                    class="btn cyan waves-effect waves-light" type="submit"
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

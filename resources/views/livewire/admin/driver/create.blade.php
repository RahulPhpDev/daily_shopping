
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

                        <div class="input-field col m12 s12">
                            <label
                                for="icon_prefix2"
                                class="active">
                                Location
                            </label>
                            <select
                                class=" select2"
                                multiple="multiple"
                                wire:model.defer="location_id"
                            >
                                @foreach( $locations as $vn => $vt)
                                    <option wire:key ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
                                @endforeach
                            </select>
                            @error('vehicle_type_id')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>





                    </div>


                    <div class="row">

                        <div class="input-field col m6 s6">
                        <label
                            for="icon_prefix2"
                            class="active">
                            Vehicle Type
                        </label>
                        <select
                            class="browser-default"
                            wire:model.defer="vehicle_type_id"
                            wire:change = "changeVehicle"
                        >
                            @foreach( $vehicleTypes as $vn => $vt)
                                <option wire:key ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
                            @endforeach
                        </select>
                        @error('vehicle_type_id')
                        <span class="text-danger">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>

                        <div class="input-field col m6 s6">
                            <label
                                for="icon_prefix2"
                                class="active">
                                Vehicle
                            </label>
                            <select
                                class="browser-default"
                                wire:model.defer="location_id"
                            >
                                @foreach( $vehicles as $vn => $vt)
                                    <option wire:key ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
                                @endforeach
                            </select>
                            @error('vehicle_type_id')
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

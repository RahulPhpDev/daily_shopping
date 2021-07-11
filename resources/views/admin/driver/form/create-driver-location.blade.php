<div class="col s12 m12 l12">
    <div id="inline-form" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Add {{$user->name}} Vehicle</h4>

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
                        name="location_id[]"
                    >
                        @foreach( $locations as $vn => $vt)
                            <option value ="{{ $vn  }}">{{ $vt  }} </option>
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
                        onchange="vehicleTypeChange()"
                        id ="vehicle_type_id"
                        name = "vehicle_type_id"
                        class="vehicle_type"
                    >
                        @foreach( $vehicleTypes as $vn => $vt)
                            <option  value ="{{ $vn }}" >{{ $vt  }} </option>
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
                        id ="vehicle_select"
                        name ="vehicle_id"
                    >
                        @foreach( $vehicles as $vn => $vt)
                            <option value ="{{ $vn }}" >{{ $vt  }} </option>
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
                            Submit
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

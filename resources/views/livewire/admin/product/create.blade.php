
<form>
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
                class="browser-default"
            >
                @foreach( $vehicleTypes as $vn => $vt)
                    <option  value ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
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

            >
                @foreach( $vehicles as $vn => $vt)
                    <option value ="{{ $vn }}" value ="{{ $vn  }}">{{ $vt  }} </option>
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

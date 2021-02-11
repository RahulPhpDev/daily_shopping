<div class="col s12 m12 l12">
    <div id="inline-form" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Add Basic Information</h4>

                <div class="row">
                    <div class="input-field col m4 s6">
                        <select name="category_id">
                            @foreach( $categories as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>Select Category</label>
                        @error('category_id')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="input-field col m4 s6">
                        <input id="icon_prefix1" type="text" name="name" class="validate">
                        <label for="icon_prefix1">Name</label>
                    @error('name')
                         <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="input-field col m4 s6">
                        <select name="unit_id">
                           @foreach( $unites as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>Select Unit</label>
{{--            {{$errors}}--}}
                        @error('unit_id')
                             <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>
        </div>
    </div>
</div>

<div class="col s12 m12 l12">
    <div id="inline-form" class="card card card-default scrollspy">
            <div class="card-content">
                <h4 class="card-title">Add Product </h4>

                <div class="row">

                    <div class="input-field col m4 s6">
                        <select name="category_id[{{$num}}]" class="browser-default">
                            @foreach( $categories as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>Select Category</label>
                        @error('category_id.{{$num}}')
                        <span class="text-danger">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>

                    <div class="input-field col m4 s6">
                        <select name="brand_id[{{$num}}]"  class="browser-default">
                            @foreach( $brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label for ="brand_id">Select Brand</label>
                        @error('brand_id.{{$num}}')
                        <span class="text-danger">
                                    {{ $message }}
                                </span>
                        @enderror

                    </div>

                    <div class="input-field col m4 s6">
                        <select name="unit_id[{{$num}}]"  class="browser-default">
                            @foreach( $unites as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>Select Unit</label>
                        {{--            {{$errors}}--}}
                        @error('unit_id.{{$num}}')
                        <span class="text-danger">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>

                </div>


                <div class = 'row'>

                    <div class="input-field col m4 s6">

                        <input id="icon_prefix1" type="text" name="name[{{$num}}]" class="validate">
                        <label for="icon_prefix1">Name</label>
                        @error('name.{{$num}}')
                             <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <div class="input-field col m4 s12">
                        <input id="quantity[{{$num}}]" name ="quantity[{{$num}}]" type="text">
                        <label>Quantity</label>
                             @error('quantity.{{$num}}')
                                 <span class="text-danger">
                                    {{ $message }}
                                 </span>
                             @enderror
                    </div>

                    <div class="input-field col m3 s12">

                        <label for="check">Is Popular</label>
                        <input type="checkbox" id="check" value ="1" name ="is_popular[{{$num}}]" style="opacity: 1"><br/>
                    </div>

                </div>


            <div class="row">

                <div class="input-field col m4 s12">

                    <input id="buying_price[{{$num}}]" name ="buying_price[{{$num}}]" type="text">
                    <label for="buying_price[{{$num}}]"> Buying Price </label>
                         @error('buying_price.{{$num}}')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                          @enderror
                </div>

                <div class="input-field col m4 s12">
                    <input id="selling_price[{{$num}}]" name ="selling_price[{{$num}}]" type="text">
                    <label for="selling_price[{{$num}}]"> Selling Price </label>
                      @error('selling_price.{{$num}}')
                          <span class="text-danger">
                            {{ $message }}
                        </span>
                     @enderror
                </div>

                <div class="input-field col m4 s6">
                    <div class="btn float-right">
                        <input type="file" name="product_image[{{$num}}]">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

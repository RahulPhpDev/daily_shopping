<div class="card-content">
    <h4 class="card-title">Add Product Attribute 2 </h4>
    <div class="row">
        <div class="input-field col m4 s6">
            <select class="browser-default" name="brand_id[{{$num}}]">
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

        <div class="input-field col m4 s12">
            <input id="attribute" name ="attribute[{{$num}}]" type="text">
            <label for="attribute"> Attribute </label>
            @error('attribute.{{$num}}')
            <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-field col m4 s12">
            <input id="quantity" name ="quantity[{{$num}}]" type="text">
            <label for="quantity">Quantity</label>
            @error('quantity.{{$num}}')
            <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="row">

        <div class="input-field col m4 s12">
            <input id="buying_price" name ="buying_price[{{$num}}]" type="text">
            <label for="buying_price"> Buying Price </label>
            @error('buying_price[{{$num}}]')
            <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>


        <div class="input-field col m3 s12">
            <input id="buying_price" name ="buying_price[1]" type="text">
            <label for="buying_price"> Buying Price </label>
            @error('buying_price.1')
            <span class="text-danger">
                                {{ $message }}
                            </span>
            @enderror
        </div>

        <div class="input-field col m4 s12">
            <input id="selling_price" name ="selling_price[{{$num}}]" type="text">
            <label for="selling_price"> Selling Price </label>
            @error('selling_price[{{$num}}]')
            <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="input-field col m4 s12 file-field">
            <div class="input-field col m3 s12">
                <div>

                    <label for="check">Is Popular</label>
                    <input type="checkbox" id="check" value ="1" name ="is_popular[{{$num}}]" style="opacity: 1"><br/>
                </div>
            </div>

            <div class="btn float-right">
                <span>Attribute Image</span>
                <input type="file" name="attribute_image[{{$num}}]">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" />
            </div>
        </div>
    </div>

</div>

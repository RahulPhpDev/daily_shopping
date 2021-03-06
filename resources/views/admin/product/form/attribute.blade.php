
{{--<div class="col s12 m12 l12">--}}
{{--    <div id="inline-form" class="card card card-default scrollspy">--}}
{{--        <div class="card-content">--}}
{{--            <h4 class="card-title">Add Product Attribute </h4>--}}
{{--                <div class="row">--}}
{{--                    <input type ="hidden" value="1" name ="count_times" id ="count_times" />--}}
                    <div class="input-field col m4 s6">


                        <select name="brand_id[1]">
                            @foreach( $brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label for ="brand_id[1]">Select Brand</label>
                        @error('brand_id.1')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

{{--                    <div class="input-field col m4 s12">--}}
{{--                        <input id="attribute" name ="attribute[1]" type="text" >--}}
{{--                        <label for="attribute"> Attribute </label>--}}

{{--                        @error('attribute.1')--}}
{{--                        <span class="text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                    <div class="input-field col m4 s12">
                        <input id="quantity[1]" name ="quantity[1]" type="text">
                        <label for="quantity[1]">Quantity</label>
                        @error('quantity.1')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

            <div class="row">
                <div class="input-field col m3 s12">
                    <div>

                        <label for="is_popular[1]">Is Popular</label>
                        <input type="checkbox" id="is_popular[1]" value ="1" name ="is_popular[1]" style="opacity: 1"><br/>
                    </div>
                </div>
                <div class="input-field col m3 s12">
                    <input id="buying_price[1]" name ="buying_price[1]" type="text">
                    <label for="buying_price[1]"> Buying Price </label>
                    @error('buying_price.1')
                    <span class="text-danger">
                                {{ $message }}
                            </span>
                    @enderror
                </div>

                <div class="input-field col m3 s12">
                    <input id="selling_price[1]" name ="selling_price[1]" type="text">
                    <label for="selling_price[1]"> Selling Price </label>
                    @error('selling_price.1')
                    <span class="text-danger">
                                {{ $message }}
                            </span>
                    @enderror
                </div>
                <div class="input-field col m3 s12 file-field">
                    <div class="btn float-right">
                        <span>Product Image</span>
                        <input type="file" name="product_image[1]">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>



                <div id ="append_attribute">
                    <!-- here will goes the append records !-->
                </div>
                <button id ="addMore" type="button" class="display-block btn btn-success btn-info float-right"> Add More + </button>
            </div>



        </div>
    </div>
</div>

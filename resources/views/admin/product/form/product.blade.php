<div class="col s12 m12 l12">
    <div id="inline-form" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Add Product </h4>

                 <div class="row">

                    <div class="input-field col m4 s6">
                        <input type ="hidden" value="1" name ="count_times" id ="count_times" />
                        <select name="category_id[1]">
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

                    <div class="input-field col m4 s6">
                        <select name="unit_id[1]">
                            @foreach( $unites as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label for = 'unit_id[1]'>Select Unit</label>
                        {{--            {{$errors}}--}}
                        @error('unit_id')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                 </div>


                <div class = 'row'>

                    <div class="input-field col m4 s6">
                        <input id="name[1]" type="text" name="name[1]" class="validate">
                        <label for="name[1]">Name</label>
                        @error('name')
                        <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="input-field col m4 s6">
                        <input id="quantity[1]" name ="quantity[1]" type="text">
                        <label for="quantity[1]">Quantity</label>
                        @error('quantity.1')
                        <span class="text-danger">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>

                    <div class="input-field col m4 s6">
                        <label for="is_popular[1]">Is Popular</label>
                        <input type="checkbox" id="is_popular[1]" value ="1" name ="is_popular[1]" style="opacity: 1"><br/>
                </div>

                </div>

                <div class="row">

                    <div class="input-field col m4 s6">
                <input id="buying_price[1]" name ="buying_price[1]" type="text">
                <label for="buying_price[1]"> Buying Price </label>
                @error('buying_price.1')
                <span class="text-danger">
                                {{ $message }}
                            </span>
                @enderror
            </div>

                     <div class="input-field col m4 s6">
                <input id="selling_price[1]" name ="selling_price[1]" type="text">
                <label for="selling_price[1]"> Selling Price </label>
                @error('selling_price.1')
                <span class="text-danger">
                                {{ $message }}
                            </span>
                @enderror
            </div>

                     <div class="input-field col m4 s6">
                            <div class="btn float-right">
                                <input type="file" name="product_image[1]">
                            </div>
                      </div>

                </div>



     </div>

    </div>

</div>
<div id ="append_attribute">
    <!-- here will goes the append records !-->
</div>

<button id ="addMore" type="button" class="display-block btn btn-success btn-info float-right"> Add More + </button>

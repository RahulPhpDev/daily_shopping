@if (! $flag)
<div class="col s12 m12 l12">
    <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title camel-case"> {{$title}}</h4>

            <div class="row">

@endif


                @if($flag)

                  <span class="camel-case">  {{ $argument.' '. $title }} </span>
                @endif

asset($producto->images->first()->path)
<div class="card">
    <img class="card-img-top" src="">
    <div class="card-body">
        <h4 class="text-right"><strong>${{$producto->price}}<strong></h4>
        <h5 class="card-title">{{$producto->title}} ({{$producto->id}})</h5>
        <p class="card-text">{{$producto->description}}</p>
        <p class="card-text"><strong>{{$producto->stock}}left</strong></p>
    </div>
</div>


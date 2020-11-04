<div class="col-12 text-center">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            
            @foreach (@$producto->images as $item)

                @if ($loop->first)

                    <div class="carousel-item active">
                        <img src="{{ $item->url }}" alt="First slide" style="height: 470px; width:auto; max-width: 100%;">
                    </div>

                @else

                    <div class="carousel-item">
                        <img src="{{ $item->url }}" alt="Second slide" style="height: 470px; width:auto; max-width: 100%;">
                    </div>

                @endif

            @endforeach

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <i class="fas fa-chevron-left fa-3x"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="fas fa-chevron-right fa-3x"></i>
            </a>

        </div>
    </div>
</div>
<div class="row">
    <!--  Main Card -->
    @foreach ($StoreItems as $item)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="./Images/Gallery 3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Buy</a>
                    <a href="#" class="btn btn-secondary">Add to chart</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commearce Stage</title>

    <!-- Bootstrap file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Main CSS file-->
    <link rel="stylesheet" href="CSS/Ecomm.css">
    <!--Normilize CSS for borwsers-->
    <link rel="stylesheet" href="CSS/normalize.css">
    <!--Font Awesome icons-->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</head>

<body>

    <!-- start header -->
    @include('Layout.header')
    <!-- end header -->

    <!-- start body -->
    <div class="store">
        @include('shared.success_message')
        <div class="container">
            <div class="row">

                <!--  Main Card -->
                @if ($editing ?? false)
                    <form method="POST" action="{{ route('manage.update', $item->id) }}">
                        @csrf
                        @method('put')
                        <textarea name="content" id="content">{{ $item->title }}</textarea>
                        @error('content')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                        <button class="btn  btn-primary">Update</button>
                    </form>
                @else
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="./Images/Gallery 3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-title">Created_by {{ $item->user->email }}</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <form method="POST" action="{{ route('manage.destroy', $item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>


                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- end body -->
</body>

</html>

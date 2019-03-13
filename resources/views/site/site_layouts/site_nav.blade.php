<nav class="navbar navbar-expand-lg bg-light special fixed-top">
    <div class="container-fluid ">
        <div class="navbar-translate">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <a class="btn btn-round special text-white " href="/"><i class="material-icons">home</i>Home</a>

            <ul class="navbar-nav ml-auto">
@auth
                <li class="nav-item active">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn special  btn-round ">

                            logout <i class="material-icons">logout</i>
                        </button>


                    </form>
                </li>
                <li>
                    <a href="#" class="btn special btn-round ">
                        {{auth()->user()->name}} <img class=" img-circle  user_img " src="/{{auth()->user()->image}}" alt="">

                    </a>
                </li>
    @else
                <li>
                    <a href="/register/" class="btn  special btn-round "> sign up
                        <i class="material-icons">add</i>
                    </a>
                </li>
    <li>
        <a href="/login/" class="btn  special btn-round "> login
            <i class="material-icons">account_circle</i>
        </a>
    </li>
    @endauth
            </ul>

        </div>
    </div>
</nav>
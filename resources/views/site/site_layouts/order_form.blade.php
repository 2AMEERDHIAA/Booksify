<!-- ========= This is the order form page .. by defualt the order location detalis
will relay on the information that user typed in regeister form
and there is a optional inputs that enable the user to change and update the order location if he want ====== -->
@extends("site.site_layouts.site_master")
@section("content")
    <div class="h-100">
        <div class="container-fluid  h-100 " id="order">
            <div class="row mt-5">
                <div class="col">
                    <h1 class="title text-white">Booksify</h1>
                </div>
            </div>

            <div class="row justify-content-center ">

                <div class="col-lg-5 col-sm-7">

                    @include("layouts.errors")
                    <div class="card">
                        <div class="card-header m-0
                        special text-white blue-gradient-rgba">
                            <h4 class="text-center">
                                Place your Order
                            </h4>
                            <h6 class="text-center"> {{auth()->user()->name }} {{""}} , your order will deliver
                                dependent on the information you have typed when registered , you can change your
                                contact as below :

                            </h6>
                        </div>
                        <!--Card content-->
                        <div class="card-body px-lg-5">
                            <!-- Form -->
                            <form action="/books/orders/create" method="post" class="text-center">
                                @csrf
                                <div class="row align-items-center justify-content-between mt-4">
                                    <div class="col-lg-5 col-sm-auto">
                                        <!-- Order Phone number-->
                                        <input value="{{auth()->user()->phone_number}}" type="number"
                                               name="phone_number" id="phone_number" class="form-control">
                                        <label for="phone_number">Type your phone Number</label>
                                    </div>
                                </div>
                                <div class="row  align-items-center justify-content-between mt-4">
                                    <div class="col">
                                        <!-- Order City-->
                                        <input value="{{auth()->user()->city}}"
                                               name="city" type="text" id="city" class="form-control">
                                        <label for="city">Type your city</label>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between mt-4">
                                    <div class="col">
                                        <!-- Order region-->
                                        <input value="{{auth()->user()->region}}" name="region" type="text" id="region"
                                               class="form-control">
                                        <label for="region">Type your Region</label>
                                    </div>
                                </div>
                                @foreach($books as $book)
                                    <input name="books_id[]" value="{{$book->id}}" type="hidden">
                                @endforeach

                                <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
                                <input name="title" type="hidden" value="{{$book->title}}">

                                <!-- Submit button -->
                                <button @click="showmessage" type="submit"
                                        class="btn btn-outline-info btn-block z-depth-0 my-5 btn-round">Order
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-sm-auto">
                    <div class="row justify-content-center align-items-center">
                        @foreach($books as $book)

                            <div class="col-auto">
                                <div class="card  card-profile wow slideInDown ml-auto mr-auto" data-wow-duration="1.5s"
                                     data-wow-delay="0.5" style="max-width: 360px">
                                    <div class="card-header card-header-image">
                                        <div class="animate">
                                            <img class="img_height_order " src="/{{$book->poster}}">
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <h3 class="title">{{$book->price}} &dollar;</h3>
                                        <h4 class=""> {{$book->title}}  </h4>
                                    </div>

                                </div>


                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include("site.site_layouts.site_footer")

        </div>

    </div>

@endsection
@section("scripts")
    <script>
        let vue = new Vue({
            el: "#order",
            // data: {
            //
//             },
            methods: {
                showmessage: function () {


                },
//
//
            },


        });
    </script>



@endsection

<!-- ================ CARTS INDEX ============ -->
@extends("site.site_layouts.site_master")
@section("content")
    <div class="container" id="carts">

        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header special blue-gradient-rgba text-white m-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto "><h4 class="title">IN CARTS</h4></div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Poster</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Author</th>
                                    <th>Edition Year</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                                </thead>

                                <tbody v-for="cart in carts">
                                <tr v-for="book in cart.books">

                                    <td class="text-center">@{{cart.id}}</td>
                                    <td><img class="img_cart" :src="`/${book.poster}`" alt=""></td>
                                    <td>@{{ book.title }} &dollar;</td>
                                    <td>@{{ book.price }}</td>
                                    <td> @{{ book.author }}</td>
                                    <td>@{{ book.edition_number }}</td>
                                    <td class="td-actions text-center">
                                        <form :action="`/books/carts/${cart.id}`" METHOD="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-danger btn"><i
                                                        class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section("scripts")

    <script>
        let vue = new Vue({
            el: "#carts",
            data: {

                books: [],

            },
            methods: {

                getUserCarts: function () {

                    axios.get("/books/carts/cart").then(response => {
                        this.books = response.data.books;

                    })

                }


            },
            mounted() {
                this.getUserCarts()
            }


        })
    </script>



@endsection


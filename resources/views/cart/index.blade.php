@extends('layouts.guest')

@section('content')

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="{{ asset('empanada-item.png') }}" alt=""></td>
                                <td class="product-name">Empanada</td>
                                <td class="product-price">₱85</td>
                                <td class="product-quantity"><input type="number" placeholder="0"></td>
                                <td class="product-total">1</td>
                            </tr>
                            <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="{{ asset('empanada-item.png') }}" alt=""></td>
                                <td class="product-name">Empanada</td>
                                <td class="product-price">₱70</td>
                                <td class="product-quantity"><input type="number" placeholder="0"></td>
                                <td class="product-total">1</td>
                            </tr>
                            <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="{{ asset('empanada-item.png') }}" alt=""></td>
                                <td class="product-name">Empanada</td>
                                <td class="product-price">₱35</td>
                                <td class="product-quantity"><input type="number" placeholder="0"></td>
                                <td class="product-total">1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>₱500</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>₱45</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>₱545</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="cart.html" class="boxed-btn">Update Cart</a>
                            <a href="checkout.html" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <button id="checkout-btn" class="boxed-btn black">Check Out</button>
        </div>
    </div>

    <div id="map" style="height: 500px; width: 100%; margin-top: 50px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <script>
        document.getElementById('checkout-btn').addEventListener('click', function() {
            initMap();
        });

        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 14.535067, lng: 120.982155}
            });
            directionsRenderer.setMap(map);

            var request = {
                origin: {lat: 14.52342, lng: 120.9881},
                destination: {lat: 14.535067, lng: 120.982155},
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                }
            });
        }
    </script>
@endsection

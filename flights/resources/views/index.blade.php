<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("commons/head")
    <body class="antialiased">
    <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

            @if (request()->get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <strong>Success!</strong> Data imported data successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif(request()->get('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                <strong>Error!</strong>  Error while importing data!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            <div class="row mt-4">
                <div class="col-md-12 mb-4 text-center">
                    <h1>Flights</h1>
                </div>
                <div class="col-md-12 mb-4">
                    @if(!empty($flights) && count($flights) > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Flight Date</th>
                                <th scope="col">Origin</th>
                                <th scope="col">Origin City</th>
                                <th scope="col">Origin State</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Destination City</th>
                                <th scope="col">Destination State</th>
                                <th scope="col">Cancelled</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <th scope="row">{{ $flight->transaction_id }}</th>
                                    <td>{{ $flight->flight_date }}</td>
                                    <td>{{ $flight->origin }}
                                    <td>{{ $flight->origin_city_name }}</td>
                                    <td>{{ $flight->origin_state_nm }}</td>
                                    <td>{{ $flight->dest }}</td>
                                    <td>{{ $flight->dest_city_name }}</td>
                                    <td>{{ $flight->dest_state_nm }}</td>
                                    <td>{{ $flight->cancelled == 1 ? '✔' : '✘' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="offset-3 col-md-6 text-center">
                            {{ $flights->links() }}
                        </div>

                    @else
                        <div class="text-center">
                            <h3>No flights are found</h3>
                        </div>
                    @endif
                </div>
                <div class="col-md-12 mb-4 text-center">
                    <a href="{{ route('import') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Import Flights</a>
                </div>
            </div>
        @include("commons/foot")
    </body>
</html>

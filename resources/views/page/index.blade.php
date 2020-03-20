@extends('page.layouts')
@section('title', 'Главная')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">


                        @can('isUser')
                            <div class="btn btn-success btn-lg">
                                user
                            </div>
                        @elsecan('isAdmin')

                            <div class="btn btn-primary btn-lg">
                                admin
                            </div>
                        @else
                            <div class="btn btn-info btn-lg">
                              other
                            </div>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



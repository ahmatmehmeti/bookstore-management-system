@extends('adminlte::page')

@section('content')
    <div class="container">
        <a href="{{route('welcome')}}"> <button type="button" class="btn btn-primary btn-sm" style="">Back to homepage</button></a>

        <div class="dashboard" style="color: teal; margin-top: 30px"><h1>Dashboard</h1></div>
        <div class="row mt-0">
            @if (auth()->user()->isAdmin())
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3 class="numbers" style="color:white">{{ $users }}  </h3>
                            <h4 style="color:white">All Users</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">
                            All Users &nbsp<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3 class="numbers" style="color:white">{{ $postiers }}  </h3>
                            <h4 style="color:white">All Postiers</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-people-carry"></i>
                        </div>
                        <a href="{{ route('postiers.index') }}" class="small-box-footer">
                            All Postiers &nbsp<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3 class="numbers" style="color:white">{{ $categories }}  </h3>
                        <h4 style="color:white">All Categories</h4>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-edit"></i>
                    </div>
                    <a href="{{ route('categories.index') }}" class="small-box-footer">
                        All Categories &nbsp<i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3 class="numbers" style="color:white">{{ $books }}  </h3>
                            <h4 style="color:white">All Books</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="{{ route('books.index') }}" class="small-box-footer">
                            All Books &nbsp<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endif
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3 class="numbers" style="color:white">{{ $orders }}  </h3>
                            <h4 style="color:white">All Orders</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-edit"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">
                            All Orders &nbsp<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                {{--@if (auth()->user()->isAdmin() || auth()->user()->isPostier())--}}
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3 class="numbers" style="color:white">{{ $pending }}  </h3>
                            <h4 style="color:white">Pending Orders</h4>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-pause-circle"></i>
                        </div>
                        <a href="{{ route('orders.pending') }}" class="small-box-footer">
                            All Pending Orders &nbsp<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3 class="numbers" style="color:white">{{ $delivering }}  </h3>
                                <h4 style="color:white">Delivering Orders</h4>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-sign-in-alt"></i>
                            </div>
                            <a href="{{ route('orders.delivering') }}" class="small-box-footer">
                                All Delivering Orders &nbsp<i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3 class="numbers" style="color:white">{{ $delivered }}  </h3>
                                <h4 style="color:white">Delivered Orders</h4>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                            </div>
                            <a href="{{ route('orders.deliveredorders') }}" class="small-box-footer">
                                All Delivered Orders &nbsp<i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
             {{--   @endif--}}
        </div>
    </div>
@endsection

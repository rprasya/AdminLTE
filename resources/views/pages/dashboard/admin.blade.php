@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row" bis_skin_checked="1">
        <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-info" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                    <h3>{{ $productCount }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-success" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                    <h3>{{ $categoryCount }}</h3>
                    <p>Category</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-warning" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-danger" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col --> --}}
    </div>
@endsection

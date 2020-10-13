@extends('layout.app-backend')
@section('title', 'Dashboard')
@section('content')
<div class="row">

   <div class="col-6 mt-3">
      <div class="card">
         <div class="card-body row">
            <div class="col-8">
               <h1 class="card-title">{{ $purchase }}</h1>
               <h6 class="card-subtitle mb-2 text-muted">Total transaction</h6>
               <a href="/backend/purchase">More info</a>
            </div>
            <div class="col-4">
               <i class="fas fa-dollar-sign text-muted pl-4" style="font-size:80pt; opacity:0.3"></i>
            </div>
         </div>
      </div>
   </div>

   <div class="col-6 mt-3">
      <div class="card">
         <div class="card-body row">
            <div class="col-8">
               <h1 class="card-title">{{ $product }}</h1>
               <h6 class="card-subtitle mb-2 text-muted">Total product</h6>
               <a href="/backend/product">More info</a>
            </div>
            <div class="col-4">
               <i class="fas fa-tshirt text-muted" style="font-size:80pt; opacity:0.3"></i>
            </div>
         </div>
      </div>
   </div>

   <div class="col-6 mt-3">
      <div class="card">
         <div class="card-body row">
            <div class="col-8">
               <h1 class="card-title">{{ $category }}</h1>
               <h6 class="card-subtitle mb-2 text-muted">Product categories</h6>
               <a href="/backend/category">More info</a>
            </div>
            <div class="col-4">
               <i class="fas fa-boxes text-muted" style="font-size:80pt; opacity:0.3"></i>
            </div>
         </div>
      </div>
   </div>

   <div class="col-6 mt-3">
      <div class="card">
         <div class="card-body row">
            <div class="col-8">
               <h1 class="card-title">{{ $size }}</h1>
               <h6 class="card-subtitle mb-2 text-muted">Product size</h6>
               <a href="/backend/size">More info</a>
            </div>
            <div class="col-4">
               <i class="fas fa-sort-amount-up text-muted" style="font-size:80pt; opacity:0.3"></i>
            </div>
         </div>
      </div>
   </div>

</div>
@endsection
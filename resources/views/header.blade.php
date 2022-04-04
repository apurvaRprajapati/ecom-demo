<?php
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Prework</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/myorders">Orders</a>
        </li>

      </ul>
        <div id="ex2">
          @if(Session::has('notification'))
            <a href="order_detail/{{Session::get('notification')['order_id']}}">
              <span class="fa-stack fa-2x has-badge" data-count="1">
                  <i class="fa fa-circle fa-stack-2x"></i>
                 <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          @else 
            <span class="fa-stack fa-2x has-badge">
               <i class="fa fa-circle fa-stack-2x"></i>
               <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
            </span>
          @endif    
           
        </div>
      <form class="d-flex">
        @if(Session::has('user'))
          <a class="nav-link" href="/cartlist">Cart({{$total}})</a>
        @else
          <a class="nav-link" href="#">Cart({{$total}})</a>
        @endif
      </form>
      @if(Session::has('user'))
      <ul class="navbar-nav">
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Session::get('user')['name']}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
      @else
      <ul class="navbar-nav">
        <li><a href="/login">Login</a></li>
      </ul>
      @endif
    </div>
  </div>
</nav>
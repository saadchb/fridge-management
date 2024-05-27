@extends('layouts.admin.app')
@section('title','Famille')
@section('button_create')
<li class="nav-item d-none d-lg-flex">
  <a class="nav-link" href="{{route('familles.create')}}">
    <span class="btn btn-primary">+ Ajouteé</span>
  </a>
</li>
@endsection

@section('content')
@if(session('success'))
<div id="toast-message" class="iziToast-wrapper iziToast-wrapper-topRight" style="margin-top: 60px;">
  <div class="iziToast-capsule" style="height: auto;">
    <div data-izitoast-ref="1713804820055" class="iziToast iziToast-theme-light iziToast-color-green iziToast-animateInside iziToast-opened iziToast-paused" id="SGVsbG8lMkMlMjB3b3JsZCFUaGlzJTIwYXdlc29tZSUyMHBsdWdpbiUyMGlzJTIwbWFkZSUyMGJ5JTIwaXppVG9hc3RncmVlbg">
      <div class="iziToast-body" style="padding-left: 33px;">
        <i class="iziToast-icon ico-success revealIn"></i>
        <div class="iziToast-texts">
          <strong class="iziToast-title slideIn" style="margin-right: 10px;">Success !</strong>
          <p class="iziToast-message slideIn">Done 👍</p>
        </div>
        <div></div>
      </div>
      <button type="button" class="iziToast-close"></button>
      <div class="iziToast-progressbar">
        <div style="transition: none 0s ease 0s; width: 0px;"></div>
      </div>
    </div>
  </div>
</div>
@else
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      Basic Tables
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
      </ol>
    </nav>
  </div>
  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Striped Table</h4>
          <p class="card-description">
            Add class <code>.table-striped</code>
          </p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    User
                  </th>
                  <th>
                    First name
                  </th>
                  <th>
                    Progress
                  </th>
                  <th>
                    Amount
                  </th>
                  <th>
                    Deadline
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face1.jpg" alt="image">
                  </td>
                  <td>
                    Herman Beck
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 77.99
                  </td>
                  <td>
                    May 15, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face2.jpg" alt="image">
                  </td>
                  <td>
                    Messsy Adam
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $245.30
                  </td>
                  <td>
                    July 1, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face3.jpg" alt="image">
                  </td>
                  <td>
                    John Richards
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $138.00
                  </td>
                  <td>
                    Apr 12, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face4.jpg" alt="image">
                  </td>
                  <td>
                    Peter Meggik
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 77.99
                  </td>
                  <td>
                    May 15, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face5.jpg" alt="image">
                  </td>
                  <td>
                    Edward
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 160.25
                  </td>
                  <td>
                    May 03, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face6.jpg" alt="image">
                  </td>
                  <td>
                    John Doe
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 123.21
                  </td>
                  <td>
                    April 05, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="../../images/faces/face7.jpg" alt="image">
                  </td>
                  <td>
                    Henry Tom
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 150.00
                  </td>
                  <td>
                    June 16, 2015
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>@endif

@endsection
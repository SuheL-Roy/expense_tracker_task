@extends('master.master')
@section('title')
    {{ __('Category List') }}
@endsection
@section('content')
    <div class="pc-container">

        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                              
                                <li class="breadcrumb-item" aria-current="page"> <h5>Category List</h5></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-md-2">

                </div>
                <div class="col-sm-6">
                    <div class="card table-card">
                        <div class="card-body">
                          
                            <div class="table-responsive">
                                <table class="table table-hover tbl-product">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->category_name }}</td>

                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-2">
                    
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#registerForm").submit(function(event) {
                event.preventDefault(); // Prevent form submission

                // Clear previous error messages
                $(".error-message").text("");

                let isValid = true;
                let name = $("#name").val();


                // Name validation
                if (name.trim() === "") {
                    $("#nameError").text("Name is required.");
                    isValid = false;
                }

                if (isValid) {
                    this.submit();
                }
            });
        });
    </script>
@endsection

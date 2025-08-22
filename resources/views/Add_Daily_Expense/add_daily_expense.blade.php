@extends('master.master')
@section('title')
    {{ __('Expense List') }}
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
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Expense List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-body">
                            <div class="text-end p-sm-4 pb-sm-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalLive">Add Daily Expense</button>
                            </div>
                            <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLiveLabel">Create Daily Expense</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>


                                        <form id="registerForm" action="{{ route('expense.expense_store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control mt-2" name="expense_date"
                                                            id="name" value="{{ date('Y-m-d') }}">
                                                        <span class="text-danger error-message" id="nameError"></span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control mt-2" name="title"
                                                            id="name" placeholder="Enter your Title">
                                                        <span class="text-danger error-message" id="nameError"></span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <select
                                                            class="form-select mt-2" name="category_id">
                                                            <option value="">Select category
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                        <span class="text-danger error-message"
                                                            id="customer_idError"></span>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="number" class="form-control mt-2" name="amount"
                                                            id="name" placeholder="Enter your amount">
                                                        <span class="text-danger error-message" id="nameError"></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover tbl-product" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Expense Date</th>
                                            <th>Title</th>
                                            <th>Category Name</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                  <td>{{ \Carbon\Carbon::parse($item->expense_date)->format('d-m-Y') }}</td>
                                                <td>{{ $item->title }}</td>
                                              
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                
                                                <td>
                                                    <a href="{{ route('expense.destroy', ['id' => $item->id]) }}"
                                                        class="btn btn-danger">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

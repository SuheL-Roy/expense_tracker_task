@extends('master.master')
@section('title')
    {{ __('Current Month Report') }}
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
                                <li class="breadcrumb-item" aria-current="page">
                                    <strong>
                                        <h5>Current Month Expense Report ({{ now()->format('F Y') }})</h5>
                                    </strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <div class="card table-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover tbl-product">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Expense Category Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($current_month_report as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ number_format($item->total_amount, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-end">Total:</th>
                                            <th>{{ number_format($total, 2) }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Card -->

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>


  
@endsection

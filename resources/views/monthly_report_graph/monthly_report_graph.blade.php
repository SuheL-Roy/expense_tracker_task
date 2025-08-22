@extends('master.master')
@section('title')
    {{ __('Current Month Expense Pie Chart') }}
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

                                <li class="breadcrumb-item" aria-current="page"> <strong>
                                        <h5>Current Month Expense Report Pie Chart ({{ now()->format('F Y') }})</h5>
                                    </strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-3">

                </div>
                <div class="col-sm-5">
                    <div class="card table-card">
                        <div class="card-body">

                            <canvas id="expenseChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">

                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('expenseChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'amount',
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: ['#f87171', '#60a5fa', '#34d399', '#fbbf24'],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
@endsection

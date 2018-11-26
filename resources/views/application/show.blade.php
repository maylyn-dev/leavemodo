@extends('layouts.admin-template')

@section('content-header')
    <h4>Leave Application Details</h4>
@endsection

@section('content')
    <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
    </div>
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Leavemodo, Ltd.
                    <small class="pull-right">Date Applied: {{ $application->date_applied->year }}/{{ $application->date_applied->month }}/{{ $application->date_applied->day }}</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <p class="lead">Details of Application</p>
                <strong>Name</strong>: {{ $application->user->name }}<br>
                <strong>Department</strong>: {{ $application->user->department->name }}<br>
                <strong>Position</strong>: {{ $application->user->position->name }}
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <p class="lead"></p>
                <strong>Leave Type</strong>: {{ $application->type->name }}<br>
                <strong>Inclusive Dates</strong>: {{ $application->start_date->format('Y-m-d') }} - {{ $application->end_date->format('Y-m-d') }}<br>
                <strong>Purpose</strong>: {{ $application->purpose }}
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <p class="lead"></p>
                <strong>Status</strong>: {{ $application->status->name }}
            </div><!-- /.col -->
        </div><!-- /.row -->
        <br>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Certification of Leave Credits</p>
                As of {{ $application->date_applied->format('Y-m-d') }}
                <div class="table-responsive">
                    @if (count($balance) > 0)
                    <?php $currentTotal = 0; ?>
                    <table class="table">
                        @foreach($balance as $balance)
                        <tr>
                            <th style="width:50%">{{ $balance->type->name }}:</th>
                            <td>{{ $balance->remaining }} days</td>
                            <?php $currentTotal += $balance->remaining; ?>
                        </tr>
                        @endforeach
                        <tr>
                            <th>Total:</th>
                            <td>{{ $currentTotal }} days</td>
                        </tr>
                    @endif
                    </table>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-6">

            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="application-details.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </section><!-- /.content -->
@endsection

@section('footer')

@endsection
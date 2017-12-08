@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Weight</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('weights.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>{{ $weight->date }}</th>
        </tr>
        <tr>
            <th>Max</th>
            <td>{{ $weight->max }}</td>
        </tr>
        <tr>
            <th>Min</th>
            <td>{{ $weight->min }}</td>
        </tr>
        <tr>
            <th>Variance</th>
            <td>{{ $weight->max-$weight->min }}</td>
        </tr>
    </table>

@endsection

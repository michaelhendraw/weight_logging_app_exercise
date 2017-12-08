@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Weight Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('weights.create') }}"> Create New Article</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>@sortablelink('date')</th>
            <th>@sortablelink('max')</th>
            <th>@sortablelink('min')</th>
            <th>Variance</th>
            <th width="280px">Action</th>
        </tr>
        <?php
            $sum_max = 0;
            $sum_min = 0;
            $sum_var = 0;
        ?>
        @foreach ($weights as $weight)
        <tr>
            <?php
                $sum_max+=$weight->max;
                $sum_min+=$weight->min;
                $sum_var+=($weight->max-$weight->min);
            ?>
            <td>{{ $weight->date }}</td>
            <td>{{ $weight->max }}</td>
            <td>{{ $weight->min }}</td>
            <td>{{ $weight->max-$weight->min }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('weights.show',$weight->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('weights.edit',$weight->id) }}">Edit</a>
                {{-- {!! Form::open(['method' => 'DELETE','route' => ['weights.destroy', $weight->id],'style'=>'display:inline']) !!} --}}
                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                {{-- {!! Form::close() !!} --}}
            </td>
        </tr>
        @endforeach
        <tr>
            <th>Average</th>
            <td>{{ $sum_max/count($weights) }}</td>
            <td>{{ $sum_min/count($weights) }}</td>
            <td>{{ $sum_var/count($weights) }}</td>
            <td></td>
        </tr>
    </table>

    {!! $weights->appends(\Request::except('page'))->render() !!}
    
@endsection
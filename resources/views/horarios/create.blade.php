@extends('layouts.app')

@section('content')
<horarios-create :records="{{json_encode($records)}}"></horarios-create>
@endsection
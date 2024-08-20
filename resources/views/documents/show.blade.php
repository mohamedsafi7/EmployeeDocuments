@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ ucfirst(str_replace('_', ' ', $document)) }}</h2>
    <p>Document for: {{ $name }}</p>
    <!-- You can expand this to include more detailed document content -->
</div>
@endsection

<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/30/16
 * Time: 7:44 AM
 */
?>

@extends('layouts.app')


@section('title')
    Notes
@stop

@section('content')
    <h1><a class="btn btn-primary pull-right" href="{{ route('note.create') }}"><i class="fa fa-plus"></i> Create</a><i
            class="fa fa-unsorted"></i> Notes</h1>
    @foreach($notes as $note)
        <div class="row">
            <div class="col-sm-2"><a href="{{ route('note.edit',['note'=>$note->id]) }}"><i class="fa fa-edit"></i> {{ $note->title }}</a></div>
            <div class="col-sm-10">{{ $note->note }}</div>
        </div>
    @endforeach
@endsection


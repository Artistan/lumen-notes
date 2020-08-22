<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/30/16
 * Time: 6:14 PM
 */
?>

@extends('layouts.app')

@section('title')
    Edit Note
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="/notes/{{ $note->id??'' }}"><i class="fa fa-unsorted"></i> Note</a></h4>
                </div>
                <div class="panel-body">

                    <form action="/notes/{{ $note->id??'' }}" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-unsorted"></i> Note</h4>
                                    </div>
                                    <div class="panel-body">
                                        @include('note.form')
                                        <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <form action=/{{ route('note.destroy') }}" method="delete">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-danger btn-block btn-lg"><i class="fa fa-eraser"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/30/16
 * Time: 6:32 PM
 */
?>

@extends('layouts.app')

@section('title')
    Create Note
@stop

@section('content')
    <form action="/notes/create" method="post">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-unsorted"></i> Note</h4>
                    </div>
                    <div class="panel-body">
                        @include('note.form')
                        <button class="btn btn-primary btn-block btn-lg">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

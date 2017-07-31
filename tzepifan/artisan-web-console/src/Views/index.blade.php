@extends('console::layouts.base')
@section('title')Interface @stop
@section('body')
    <div class="container main-wrapper">
        <div id="screen"></div>
        <div contenteditable="true" id="input"></div>
    </div>
    <div class="container actions-wrapper">
        <div class="btn-group">
            <button class="btn btn-default" id="run"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Run</button>
            <button class="btn btn-primary" id="help"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Help</button>
            <button class="btn btn-danger right" id="clear"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Clear</button>
        </div>
    </div>
@stop
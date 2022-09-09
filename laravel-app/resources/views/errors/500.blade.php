@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __($exception->getMessage() ? $exception->getMessage() :'Whoops, Terjadi Kesalahan Kesalahan Server'))

@extends('layouts.app')

@section('title','List Contact')

@section('content')
    <livewire:contact.liste />
    <livewire:contact.forms.create-form />
    <livewire:contact.forms.edit-form />
    <livewire:contact.forms.show-form />
    <livewire:contact.modals.delete-modal />
@endsection

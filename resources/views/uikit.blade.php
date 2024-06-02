@extends('layouts.app')

@section('title', 'uikit')

@section('content')

    <div>
        <div class="flex flex-wrap">
            <div class="w-30 h-30 p-5 m-2 bg-custom-dark text-white flex items-center justify-center">custom-dark</div>
            <div class="w-30 h-30 m-2 bg-custom-gray text-white flex items-center justify-center">custom-gray</div>
            <div class="w-30 h-30 m-2 bg-custom-blue-2 text-black flex items-center justify-center">custom-blue-2</div>
            <div class="w-30 h-30 m-2 bg-custom-blue text-white flex items-center justify-center">custom-blue</div>
            <div class="w-30 h-30 m-2 bg-custom-status-blue text-white flex items-center justify-center">custom-status-blue
            </div>
            <div class="w-30 h-30 m-2 bg-custom-status-blue-bg text-black flex items-center justify-center">
                custom-status-blue-bg</div>
            <div class="w-30 h-30 m-2 bg-custom-button-blue text-white flex items-center justify-center">custom-button-blue
            </div>
            <div class="w-30 h-30 m-2 bg-custom-light-blue text-black flex items-center justify-center">custom-light-blue
            </div>
            <div class="w-30 h-30 m-2 bg-custom-lighter-blue text-black flex items-center justify-center">custom-lighter-blue
            </div>
            <div class="w-30 h-30 m-2 bg-custom-dark-blue text-white flex items-center justify-center">custom-dark-blue
            </div>
            <div class="w-30 h-30 m-2 bg-custom-dark-green text-white flex items-center justify-center">custom-dark-green
            </div>
            <div class="w-30 h-30 m-2 bg-custom-dark-blue-2 text-white flex items-center justify-center">custom-dark-blue-2
            </div>
            <div class="w-30 h-30 m-2 bg-custom-lighter-gray text-black flex items-center justify-center">
                custom-lighter-gray</div>
            <div class="w-30 h-30 m-2 bg-custom-lighter-gray-2 text-black flex items-center justify-center">
                custom-lighter-gray-2</div>
            <div class="w-30 h-30 m-2 bg-custom-dark-gray text-white flex items-center justify-center">custom-dark-gray
            </div>
            <div class="w-30 h-30 m-2 bg-custom-light-green text-black flex items-center justify-center">custom-light-green
            </div>
            <div class="w-30 h-30 m-2 bg-custom-light-orange text-black flex items-center justify-center">
                custom-light-orange</div>
            <div class="w-30 h-30 m-2 bg-custom-dark-red text-white flex items-center justify-center">custom-dark-red</div>
            <div class="w-30 h-30 m-2 bg-custom-red text-white flex items-center justify-center">custom-red</div>
            <div class="w-30 h-30 m-2 bg-custom-dark-red-2 text-white flex items-center justify-center">custom-dark-red-2
            </div>
        </div>
    </div>

    <div
        class="fixed inset-0  duration-1000 flex items-center justify-center z-50 transition-opacity  ease-in-out bg-black bg-opacity-50">
        <div class=" bg-custom-light-blue max-w-2xl  rounded-lg w-full ">
            <div class="bg-white rounded-lg p-5">
                <div class="mb-5 flex justify-start items-start gap-5">
                    <img src="{{ asset('Icons/danger.svg') }}" class="w-10  h-10">
                    <div>
                        <h1 class="text-xl font-semibold mb-5">Supprimer le contact</h1>
                        <div class="text-base text-custom-gray ">
                            <p>Etes-vous sûr de vouloir supprimer le contact ?</p>
                            <p> Cette opération est irreversible.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 flex gap-3 justify-end items-end">
                <button
                    class="focus:bg-custom-blue shadow-md py-2 px-4 duration-300 rounded-md border hover:bg-custom-button-blue hover:text-white text-custom-dark focus:text-white focus:border-custom-button-blue ">
                    <p class="px-2">Annuler</p>
                </button>
                <button
                    class="bg-red-500 shadow-md py-2 px-4 duration-300 rounded-md border focus:bg-red-400 hover:bg-opacity-80 text-white focus:border-red-400 border-red-600">
                    <p class="px-2">Confirmer</p>
                </button>
            </div>

        </div>
    </div>





@endSection

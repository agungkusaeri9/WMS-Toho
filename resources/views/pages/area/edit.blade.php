@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Area</h4>
                    <form action="{{ route('areas.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='code' class='mb-2'>Code</label>
                            <input type='text' name='code' class='form-control @error('code') is-invalid @enderror'
                                value='{{ $item->code ?? old('code') }}'>
                            @error('code')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Name</label>
                            <input type='text' name='name' class='form-control @error('name') is-invalid @enderror'
                                value='{{ $item->name ?? old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='type'>Type</label>
                            <select name='type' id='type' class='form-control @error('type') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih type</option>
                                @foreach ($types as $type)
                                    <option @selected($type == $item->type ?? old('type')) value='{{ $type }}'>{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='description' class='mb-2'>Description</label>
                            <textarea name='description' id='description' cols='30' rows='3'
                                class='form-control @error('description') is-invalid @enderror'>{{ $item->description ?? old('description') }}</textarea>
                            @error('description')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('areas.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Area</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
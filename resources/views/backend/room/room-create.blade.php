@extends('backend.layout.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="carContent px-4 py-4 bg">
        <div class="d-flex justify-content-between">
            <h4>Room Create</h4>
            <a href="{{ route('room') }}" class="btn btn1 btn-primary">Back</a>
        </div>

        <form action="{{ route('roomStore') }}" method="POST" class="px-3 py-3" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter your price" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="wifi" class="form-label">WiFI</label>
                    <select name="wifi" class="form-select" aria-label="Default select example">
                        <option selected value="">Select WiFi</option>
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="room_type" class="form-label">Room Type</label>
                    <select name="room_type" class="form-select" aria-label="Default select example">
                        <option selected value="">Select Room Type</option>
                        <option value="regular">regular</option>
                        <option value="premium">premium</option>
                        <option value="deluxe">deluxe</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="" placeholder="description" class="form-control"></textarea>
                    @error('description')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endSection
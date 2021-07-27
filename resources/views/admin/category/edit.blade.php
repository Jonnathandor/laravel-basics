<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category <b></b>
            <b style="float:right;">
                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Edit category</div>
                    <div class="card-body">
                        <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="category__name">Update Category Name</label>
                                <input type="text" name="category_name" value="{{ $categories->category_name }}" class="form-control" id="category__name" aria-describedby="category__name">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

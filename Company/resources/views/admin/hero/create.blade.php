<x-AdminLayout>
    <x-slot name="title">
        - ایجاد صفحه معرفی
    </x-slot>

    <div class="col-6 offset-3">
        <div class="card rounded-4 mt-5">
            <div class="card-body">
                <form action="{{ route('heroes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" name="title" class="form-control rounded-5 @error('title') is-invalid @enderror" id="title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">توضیحات</label>
                        <textarea name="description" class="form-control rounded-4 @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">تصویر</label>
                        <input type="file" name="image" class="form-control rounded-5 @error('image') is-invalid @enderror" id="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary rounded-5">ایجاد صفحه معرفی</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-AdminLayout>

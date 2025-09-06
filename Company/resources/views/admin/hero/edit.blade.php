<x-AdminLayout>
    <x-slot name="title">
        - ویرایش صفحه معرفی
    </x-slot>

    <div class="col-6 offset-3">
        <div class="card rounded-4 mt-5">
            <div class="card-body">
                <form action="{{ route('heroes.update', $hero->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" name="title" class="form-control rounded-5 @error('title') is-invalid @enderror" id="title" value="{{ $hero->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">توضیحات</label>
                        <textarea name="description" class="form-control rounded-4 @error('description') is-invalid @enderror" id="description" rows="3">{{ $hero->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">تصویر</label>
                        <input type="file" name="image" class="form-control rounded-5 @error('image') is-invalid @enderror" id="image">
                        @if(!empty($hero->image))
                            <figure>
                                <img src="{{ asset('hero/images/' . $hero->image) }}" class="img-fluid rounded-4" alt="" srcset="">
                            </figure>
                        @endif
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary rounded-5">به روز رسانی صفحه معرفی</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-AdminLayout>

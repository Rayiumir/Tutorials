<x-AdminLayout>
    <x-slot name="title">
        - مدیریت دسته بندی ها
    </x-slot>

    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col" width="200px">عنوان دسته بندی</th>
                    <th scope="col">اسلاگ</th>
                    <th scope="col" width="100px">دسته والد</th>
                    <th scope="col" width="50px">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->slug }}</td>
                        <td>{{ $row->getParentName() }}</td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit', $row->id) }}" class="text-secondary"><i class="fa-duotone fa-edit"></i></a>
                            <a onclick="event.preventDefault(); document.getElementById('trash-{{ $row->id }}').submit();" class="text-danger"><i class="fa-duotone fa-trash"></i></a>
                            <form id="trash-{{ $row->id }}" action="{{ route('categories.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
        <div class="col-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="example1" class="form-label">عنوان دسته بندی :</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror rounded-5" name="title" id="example1">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example2" class="form-label">اسلاگ دسته بندی :</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror rounded-5" name="slug" id="example2">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="example3">انتخاب دسته والد :</label>
                            <select class="form-select @error('category_id') is-invalid @enderror rounded-5" name="category_id" aria-label="Default select example" id="example3">
                                <option selected disabled>انتخاب کنید ...</option>
                                <option value="">ندارد</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary rounded-5">ایجاد دسته بندی</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-AdminLayout>

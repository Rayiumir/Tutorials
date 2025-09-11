<x-AdminLayout>
    <x-slot name="title">
        - مدیریت خدمات ما
    </x-slot>

    <div class="row">
        <div class="col-8">
            <table class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col" width="200px">عنوان</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col" width="100px">آیکون</th>
                    <th scope="col" width="50px">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->icon }}</td>
                        <td class="text-center">
                            <a href="{{ route('services.edit', $row->id) }}" class="text-secondary"><i class="fa-duotone fa-edit"></i></a>
                            <a onclick="event.preventDefault(); document.getElementById('trash-{{ $row->id }}').submit();" class="text-danger"><i class="fa-duotone fa-trash"></i></a>
                            <form id="trash-{{ $row->id }}" action="{{ route('services.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $services->links() }}
        </div>
        <div class="col-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="example1" class="form-label">عنوان :</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror rounded-5" name="title" id="example1">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example2" class="form-label">توضیحات :</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror rounded-4" name="description" id="example2"></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example1" class="form-label">آیکون :</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror rounded-5" name="icon" id="example1">
                            @error('icon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary rounded-5">ایجاد خدمات ما</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-AdminLayout>

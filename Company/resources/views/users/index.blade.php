<x-AdminLayout>
    <x-slot name="title">
        - مدیریت کاربران
    </x-slot>
    <a href="{{ route('users.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن کاربر جدید </a>
    <table class="table table-bordered table-hover mt-3">
        <thead>
            <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="200px">نام و نام خانوادگی</th>
                <th scope="col">ایمیل</th>
                <th scope="col" width="50px">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $row->id) }}" class="text-secondary"><i class="fa-duotone fa-edit"></i></a>
                        <a onclick="event.preventDefault(); document.getElementById('trash-{{ $row->id }}').submit();" class="text-danger"><i class="fa-duotone fa-trash"></i></a>
                        <form id="trash-{{ $row->id }}" action="{{ route('users.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</x-AdminLayout>

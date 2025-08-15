<x-AdminLayout>
    <x-slot name="title">
        - ایجاد کاربر جدید
    </x-slot>

    <div class="col-md-6 offset-3 mt-5">
        <div class="card rounded-4">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col">
                            <label for="name">نام و نام کاربری :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror rounded-5" name="name" id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email">ایمیل :</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror rounded-5" name="email" id="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">رمز عبور :</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror rounded-5" name="password" id="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-5 mt-3">ثبت کاربر</button>
                </form>
            </div>
        </div>
    </div>
</x-AdminLayout>

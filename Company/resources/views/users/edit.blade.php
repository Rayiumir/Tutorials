<x-AdminLayout>
    <x-slot name="title">
        - ویرایش کاربر {{ $user->name }}
    </x-slot>

    <div class="col-md-6 offset-3 mt-5">
        <div class="card rounded-4">
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="name">نام و نام کاربری :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror rounded-5" name="name" id="name" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="email">ایمیل :</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror rounded-5" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="password">رمز عبور :</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror rounded-5" name="password" id="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="role" class="form-label">نقش کاربری :</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror rounded-5">
                                <option value="">انتخاب نقش کاربری :</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>ادمین</option>
                                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>نویسنده</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>کاربر</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-5 mt-3">ثبت کاربر</button>
                </form>
            </div>
        </div>
    </div>
</x-AdminLayout>

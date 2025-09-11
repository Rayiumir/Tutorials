<x-AdminLayout>
    <x-slot name="title">
        - مدیریت درباره ما
    </x-slot>
    <a href="{{ route('about.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> ایجاد درباره ما </a>

    @if($about)
        <div class="col-8 offset-2">
            <div class="card rounded-4 mt-5">
                <div class="card-body">
                    <div class="text-end">
                        <a href="{{ route('about.edit', $about->id) }}" class="text-secondary"><i class="fa-duotone fa-edit fs-5"></i></a>
                        <a onclick="event.preventDefault(); document.getElementById('trash-{{ $about->id }}').submit();" class="text-danger"><i class="fa-duotone fa-trash fs-5"></i></a>
                        <form id="trash-{{ $about->id }}" action="{{ route('about.destroy', $about->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h1 class="fs-3 fw-bold">{{ $about->title }}</h1>
                            <p>{{ $about->description }}</p>
                        </div>
                        <div class="col-6">
                            <figure>
                                <img src="{{ asset('about/images/' . $about->image) }}" class="img-fluid rounded-4" alt="" srcset="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-AdminLayout>

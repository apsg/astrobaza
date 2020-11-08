<div>
    <form action="{{ route('openings.store') }}" method="post">
        @csrf
        <div class="d-flex">
            <input type="date"
                   name="date"
                   class="form-control @error("date") 'is-invalid' @enderror"
                   min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                   value="{{ old('date') }}"
                   required>
            <input type="time"
                   name="from"
                   class="form-control @error("date") 'is-invalid' @enderror"
                   required
                   value="{{ old('from') }}">
            <input type="time"
                   name="to"
                   class="form-control @error("date") 'is-invalid' @enderror"
                   value="{{ old('to') }}"
                   required>
            <button class="btn btn-astro" type="submit">
                <i class="fa fa-plus"></i>
            </button>

            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </form>
</div>

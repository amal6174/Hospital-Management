<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Qualification</th>

            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($doctors as $doctor)

        <tr>

            <td>
                  {{ $doctors->firstItem() + $loop->index }}
            </td>

            <td>
                @if($doctor->image)
                <img src="{{ asset('storage/' . $doctor->image) }}" width="50" height="50" class="rounded"
                    alt="{{ $doctor->name }}">
                @else
                No Image
                @endif
            </td>

            <td>
                {{ $doctor->name }}
            </td>
            <td>
                {{ $doctor->slug }}
            </td>

            <td>
                {{ $doctor->category->category_name ?? 'N/A' }}
            </td>

            <td>
                @foreach($doctor->qualifications as $qualification)

                <span class="badge bg-primary">
                    {{ $qualification->qualification_name }}
                </span>

                @endforeach
            </td>

            {{-- <td>
                {{ $doctor->designation }}
            </td> --}}
            {{--
            <td>
                {{ $doctor->experience }} Years
            </td> --}}
            {{--
            <td>
                ₹{{ $doctor->consultant_fee }}
            </td> --}}

            <td>
                {{ $doctor->email }}
            </td>

            <td>
                {{ $doctor->phone }}
            </td>

            <td>
                {{ ucfirst($doctor->gender) }}
            </td>

            <td>
                @if($doctor->status == 1)
                <span class="badge bg-success">
                    Active
                </span>
                @else
                <span class="badge bg-danger">
                    Inactive
                </span>
                @endif
            </td>

            <td>
                <a href="{{ route('admin.doctor.edit',$doctor->id) }}?page={{ $doctors->currentPage() }}"
                    class="btn btn-sm btn-primary">
                    Edit
                </a>

                {{-- <button class="btn btn-sm btn-danger">
                    Delete
                </button> --}}

                <a href="{{ route('admin.doctor.destroy',$doctor->id) }}" class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

<div class="mt-4">
    {{ $doctors->links() }}
</div>

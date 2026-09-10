<table class="table table-bordered table-striped" id="example">

    <thead class="bg-primary text-white">

        <tr>

            <th width="5%">#</th>
            <th>Image</th>

            <th>Category Name</th>

            {{-- <th>Description</th> --}}

            <th width="10%">Status</th>

            <th width="18%">Action</th>

        </tr>

    </thead>

    <tbody>



        @forelse($categories as $key => $category)

        <tr>



            <td>{{ $key + 1 }}</td>

            <td>
                <img src="{{ asset('categories/' . $category->image) }}" alt="Category Image" class="img-thumbnail"
                    style="width:50px; height:50px; object-fit:cover;">
            </td>

            <td>{{ $category->category_name }}</td>

            {{-- <td>{{ $category->description }}</td> --}}


            <td>
                <button class="btn btn-sm status-btn {{ $category->status ? 'btn-success' : 'btn-danger' }}"
                    data-id="{{ $category->id }}">

                    {{ $category->status ? 'Active' : 'Inactive' }}

                </button>

            </td>


            <td>
                <a href="{{ route('admin.category.edit',$category->id) }}?page={{ $categories->currentPage()}}"
                    class="btn btn-warning btn-sm">

                    <i class="ti-pencil"></i>

                </a>

            </td>








            {{--
            <td>

                <a href="{{ route('admin.category.edit', $category->id) }}?page={{ $categories->currentPage() }}"
                    class="btn btn-primary">
                    Edit
                </a>

            </td> --}}

        </tr>

        @empty

        <tr>
            <td colspan="3" class="text-center">
                No categories found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

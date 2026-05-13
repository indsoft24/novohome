@extends('admin.layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Customer Reviews</h3>

        <span class="badge bg-dark px-3 py-2">
            Total Reviews: {{ count($testimonials) }}
        </span>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>Serial No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($testimonials as $key => $t)

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>
                            <img src="{{ asset('images/'.$t->image) }}"
                                 width="70"
                                 height="70"
                                 style="object-fit:cover;border-radius:12px;border:2px solid #eee;">
                        </td>

                        <td>
                            <div class="fw-semibold">
                                {{ $t->name }}
                            </div>
                        </td>

                        <td style="max-width:300px;">
                            {{ Str::limit($t->message, 80) }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <!-- Edit -->
                                <a href="{{ url('/admin/testimonials/edit/'.$t->id) }}"
                                   class="btn btn-sm btn-warning px-3 text-dark fw-semibold">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ url('/admin/testimonials/delete/'.$t->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this review?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger px-3 fw-semibold">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No reviews found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="fas fa-compass me-2"></i>
                Explore Pages
            </h3>

            <p class="text-muted mb-0">
                Manage all explore pages
            </p>
        </div>

        <a href="/admin/explore/create" class="btn btn-dark">
            <i class="fas fa-plus me-1"></i>
            Add Page
        </a>

    </div>

    <!-- Card -->
    <div class="card shadow border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Banner</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pages as $page)

                        <tr>

                            <td>
                                #{{ $page->id }}
                            </td>

                            <td>
                                @if($page->banner)

                                    <img src="{{ asset('images/' . $page->banner) }}"
                                         width="70"
                                         height="50"
                                         style="object-fit:cover;border-radius:8px;">

                                @else

                                    <span class="text-muted">
                                        No Image
                                    </span>

                                @endif
                            </td>

                            <td class="fw-semibold">
                                {{ $page->title }}
                            </td>

                            <td>
                                {{ $page->slug }}
                            </td>

                            <td>
                                {{ $page->category }}
                            </td>

                            <td>

                                <a href="/admin/explore/edit/{{ $page->id }}"
                                   class="btn btn-warning btn-sm text-dark fw-bold">
                                   <i class="fas fa-edit"></i> Edit
                                </a>

                                <a href="/admin/explore/delete/{{ $page->id }}"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this page?')">

                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-5 text-muted">

                                No explore pages found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
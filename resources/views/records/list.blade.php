<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">List of All Records</h2>

        @if($records->isEmpty())
            <p>No records found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Course 1</th>
                        <th>Course 1 Text</th>
                        <th>Course 2</th>
                        <th>Course 2 Text</th>
                        <th>Course 3</th>
                        <th>Course 3 Text</th>
                        <th>Wamba Status</th>
                        <th>Institute</th>
                        <!-- Sorting links for Completion and Creation Date -->
                        <th>
                            <a href="{{ route('listRecords', ['sort' => 'completion', 'direction' => $sort === 'completion' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                Completion Date
                                @if($sort === 'completion')
                                    @if($direction === 'asc') ▲ @else ▼ @endif
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('listRecords', ['sort' => 'created_at', 'direction' => $sort === 'created_at' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                Created At
                                @if($sort === 'created_at')
                                    @if($direction === 'asc') ▲ @else ▼ @endif
                                @endif
                            </a>
                        </th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->fname }}</td>
                            <td>{{ $record->lname }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->mobile }}</td>
                            <td>{{ $record->course1 }}</td>
                            <td>{{ $record->course1text }}</td>
                            <td>{{ $record->course2 }}</td>
                            <td>{{ $record->course2text }}</td>
                            <td>{{ $record->course3 }}</td>
                            <td>{{ $record->course3text }}</td>
                            <td>{{ $record->wambastatus }}</td>
                            <td>{{ $record->institute }}</td>
                            <td>{{ $record->completion }}</td>
                            <td>{{ $record->created_at }}</td>
                            <td>{{ $record->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

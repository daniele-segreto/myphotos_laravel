@if (count($photos) == 0)

    <h1 class="text-center">You have 0 photos</h1>
@else
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Url</th>
                <th>Preview</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td>{{ $photo->title }}</td>
                    <td>{{ $photo->url }}</td>
                    <td><img class="photo-preview" src="{{ $photo->url }}"></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endif

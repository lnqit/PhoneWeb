<div class="col-md-12 text-center">
    <h3>Tags List</h3>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tag_Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($tag_info as $key => $tag)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $tag->tag_name}}</td>
                    <td>{{ $tag->slug}}</td>
                    <td>
                        <button type="button" class="btn btn-white ml- deleteUser" data-toggle="modal" data-target="#exampleModalDelete" data-id="{{$tag->id}}"><i class="fas fa-trash-alt text-danger"></i></button>
                      </td>
                </tr>
            @endforeach()
        </tbody>
    </table>
</div>
@extends('admin.appLayout.index')
@section('content')

<div class="container-fluid pt-4 px-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->summary}}</td>
                                        <td><img src="upload/news/{{$item->image}}" alt="" width="100px"></td>
                                      
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>

@endsection

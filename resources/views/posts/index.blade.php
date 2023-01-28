@extends('layouts.app')

@section('title') index @endsection

@section('content')
        <!-- start table -->
        <table
            class="table table-striped"
            style=" border:2px solid #007bff; margin:15px; width:96%;">
            <!-- Table Head -->
            <thead class="bg-primary" style="border-bottom:2px solid #007bff;">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted by</th>
                    <th scope="col">Date of creation</th>
                    <!-- <th scope="col">Mail Status</th> -->
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Table tittle -->
                <h3 style="text-align: center; margin:20px;">
                    Welcome to your Posts
                </h3>
                <!-- Table rows -->
                @foreach($posts as $post)
                <tr>
                    <th>#{{$post['id']}}</th>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['posted_by']}}</td>
                    <td>{{$post['created_at']}}</td>
                    <!-- <td>Yes send
                        <?php // if(empty($row['confirmReceiveMail'])){echo "don't Send";}else{echo "yes Send";}?>
                    </td> -->
                    <td style="padding: 0.75rem; padding-bottom: 0;">
                        <!-- <a class="btn btn-outline-primary" href="#" role="button">Link</a> -->
                        <a href="{{route('posts.show', $post['id'])}}">
                            <svg
                             xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                        </a>
                        <a href="data.php">
                        <svg
                         xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                        </svg>
                        </a>
                        <a href="data.php">
                        <svg
                         xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7l16 0"></path>
                            <path d="M10 11l0 6"></path>
                            <path d="M14 11l0 6"></path>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <!-- <script> function
        newDoc(){window.location.assign("./validation.php")}</script> <button
        onclick=newDoc(); class="btn btn-primary" style="background-color: black;
        margin-left: 260px; width:140px;border-color: black; ">Add Student </button> -->

        @endsection
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="_token" content="{{ csrf_token() }}">
      <!-- MDB -->
      <link
         href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"
         rel="stylesheet"
         />
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Font Awesome -->
      <link
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
         rel="stylesheet"
         />

         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <title>Dashboard</title>
   </head>
   <body>
      <div class="container">
         <section style="background-color: #eee;" >
         <div class="container py-5" style="padding: 0%">
            <div class="row">
               <div class="col">
                  <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                     <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                     </ol>
                     <a href="logout"><button type="button" style="margin-left: 90%" class="btn btn-danger">logout</button></a>
                  </nav>
               </div>
           
            </div>
            <h5>Welcome {{session()->get('name')}} </h5>
            <div class="row" style="padding-top: 0px">
               {{-- 
               <div class="col-lg-4">
                  <div class="card mb-4">
                     <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                           class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{session()->get('name')}}</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Pune,Maharashtra</p>
                        <div class="d-flex justify-content-center mb-2">
                           <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
                           <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                     </div>
                  </div>
               </div>
               --}}
               <div class="col-lg-12" >
                  <section class="vh-100 gradient-custom-2">
                     <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                           <div class="col-md-12 col-xl-10">
                              <div class="card mask-custom">
                                 <div class="card-body p-4 text-white">
                                    <div class="text-center pt-3 pb-2">
                                       <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                                          alt="Check" width="60">
                                       <h2 class="my-4" style="color: black">Task List</h2>
                                    </div>
                                    <!-- Button trigger modal -->
                                    {{-- <button style="margin-left: 90%;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Task
                                    </button> --}}
                                    <button class="btn btn-primary mt-3" id="add-task-btn">Add task</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                                                <button type="button" id="add-task-btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                               <form action="{{url("api/todo/add")}}" method="POST">
                                                  @csrf
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Enter Task</label>
                                                  <textarea name="task" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                   <input type="hidden" name="user_id" value="{{$user_data->id}}" >
                                                  
                                                </div>
                                               
                                              




                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                              </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    {{-- table body  --}}

                                    <div id="task-list" class="mt-4"></div>

                                    {{-- table body end  --}}


                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </div>

      <script>
         $(document).ready(function() {
             loadTasks();


             $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
             // Load tasks for the logged-in user
             function loadTasks() {
                 $.ajax({
                     url: 'api/todo/tasks',
                     type: 'GET',
                     success: function(data) {
                         let tasks = data.tasks;
                         let html = '<table class="table text-white mb-0">  <thead> <tr><th scope="col">Sr.No</th><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Actions</th></tr></thead>';
                         tasks.forEach(task => {
                             html += `
                                      
                                        <tr class="fw-normal">
                                             <th>
                                                <span class="ms-2">${task.id}</span>
                                             </th>
                                             <td class="align-middle">
                                                <span>${task.task}</span>
                                             </td>
                                             <td class="align-middle">
                                             
                                                
                                                <h6 class="mb-0"><span style="color:black;" class="badge">${task.status}</span></h6>
                                              
                                                
                                               
                                             </td>
                                             <td class="align-middle">
                                                
                                             <button class="btn btn-sm btn-success mark-done-btn" data-id="${task.id}" style="float: right;">Done</button>
                                             <button class="btn btn-sm btn-warning mark-pending-btn" data-id="${task.id}" style="float: right; margin-right: 10px;">Pending</button>
                                             </td>
                                          </tr>

                                 </tbody>
                                    
                                 
                             `;
                         });
                         html += '</table>';
                         $('#task-list').html(html);
                     }
                 });
             }
 
             // Mark task as done
             $(document).on('click', '.mark-done-btn', function() {
                 let taskId = $(this).data('id');
                 $.ajax({
                     url: `/api/todo/tasks/${taskId}/mark_done`,
                     type: 'POST',
                     data:{
                        _token: '{{ csrf_token() }}'
                     },
                     success: function() {
                         loadTasks();
                     }
                 });
             });
 
             // Mark task as pending
             $(document).on('click', '.mark-pending-btn', function() {
                 let taskId = $(this).data('id');
                 $.ajax({
                     url: `/api/todo/tasks/${taskId}/mark_pending`,
                     type: 'POST',
                     data:{
                        _token: '{{ csrf_token() }}'
                     },
                     success: function() {
                         loadTasks();
                     }
                 });
             });

             
 
             // Add new task
             $('#add-task-btn').click(function() {
                 let taskTitle = prompt('Enter task title:');
                 if (taskTitle) {
                     $.ajax({
                         url: '/api/todo/tasks',
                         type: 'POST',
                         data: {
                             title: taskTitle,
                             _token: '{{ csrf_token() }}'
                         },
                         success: function() {
                           
                             loadTasks();
                         }
                     });
                 }
             });
         });
     </script>



   </body>
</html>
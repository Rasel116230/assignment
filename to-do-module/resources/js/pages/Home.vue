<template>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">



<div class="card">
    <div class="card-header">Todo List</div>
  <div class="card-body">

    <!-- add modal -->
    <Modal :visible="false"  title="Add Task" variant="primary" btnString="Add+">
      <div class="Modal">
        <div class="alert alert-success my-2" role="alert" v-if="message.length>0">
       <label>{{message }}</label>
      </div>
      <div class="mb-3">
    <input type="text" class="form-control" placeholder="Task name" aria-label="to do" v-model="task_name"/>
    </div>
    <div class="mb-3">
      <textarea class="form-control" placeholder="Task description" aria-label="task description" v-model="task_description"></textarea>
    </div>
   
    <button type="button" class="btn btn-success text-white active" @click="addItem()">Save</button>
  </div>
    </Modal>

     

    

<h1 v-if="tasks.length<=0">No data to show.. Please Add</h1>
  <table class="table table-bordered mt-4" v-if="tasks.length>0">
    <thead class="text-center">
    <th>Sr.no</th>
    <th>Name</th>
    <th>Status</th>
    <th>Action</th>
    </thead>
    <tbody>
        <tr v-for="(task,index) in tasks">
            <td>{{index+1 }}</td>
            <td>{{task.name }}</td>
            <td v-if="task.completed==0"><span class="badge text-bg-danger">Not Completed</span></td>
            <td v-if="task.completed==1"><span class="badge text-bg-success">Completed</span></td>
            <td>
              <button class="btn btn-success text-white mx-1" v-if="task.completed==0" @click="updateStatus(task.id)">Done</button>
              <updateItem :id="task.id">Edit</updateItem>
              <button class="btn btn-danger text-white" @click="deleteItem(task.id,index)">Delete</button>
            </td>
        </tr>
    </tbody>

  </table>
  </div>
</div>
</div>  
</div>
</template>

<script>
import Modal from '../conponents/Modal.vue';
import updateItem from '../conponents/updateItem.vue';

export default{
  components:{
    Modal,
    updateItem
  },
   data(){
    return{
        tasks:[],
        task_name:'',
        task_description:'',
        message:'',
      
    }
   },



   mounted() {
  this.getItems();

   },
   methods:{

    // get all To do task Items----
    getItems() {
            axios
                .get("api/tasks")
                .then(res => {
                    this.tasks = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },


 // add new To do task Items----
       addItem(){
        let data={
          'name':this.task_name,
          'description':this.task_description 
         };

        if(this.task_name.length>0){
          axios.post("api/tasks/save",data)
                .then(res => {
                    this.tasks.push(res.data);
                    this.message="Successfully Added";
                 // Delay the action for 4 seconds
             setTimeout(() => {
              this.clear();
              }, 4000);

                })
                .catch(error => {
                    console.log(error);
                });
        }
       
       },


       clear(){
        this.title='';
         this.task_name='';
         this.task_description='';
         this.message="";
       },
  
      

    
      


 

        // delete To do task Items----
       deleteItem(id,index) {
      if(confirm('Are you sure! you want to delete?')){
            axios
                .delete("api/tasks/"+id)
                .then(res => {
                  this.tasks.slice(index,1);
                  this.getItems();
                })
                .catch(error => {
                    console.log(error);
                });
            }
              
        },

         // change statur of To do task Items----
        updateStatus(id){
      if(confirm('Are you sure! you want to change status?')){
            axios
                .get("api/tasks/status/"+id)
                .then(res => {
                  this.getItems();
                })
                .catch(error => {
                    console.log(error);
                });
            }
              
        },

   

   },

   
}

</script>
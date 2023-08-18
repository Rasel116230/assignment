<template>

 <!-- update modal -->
 <Modal :visible="false"  title="Update Task" variant="info" btnString="Edit">
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
   
    <button type="button" class="btn btn-success text-white active" @click="updateItem(id)">update</button>
  </div>
    </Modal>


</template>

<script>
import Modal from '../conponents/Modal.vue';

export default{
  components:{
    Modal,
  },
  props:{
    id:Number
  },
   data(){
    return{
        task_name:'',
        task_description:'',
        message:'',
    }
   },

   mounted() {
    this.updateModal(this.id);
   },
  
   methods:{

       clear(){
         this.task_name='';
         this.task_description='';
         this.message="";
       },


  
      //to do update modal show------
      updateModal(id){
        this.clear();
        axios
        .get("api/tasks/edit/"+id)
        .then(res => {
         this.task_name=res.data.name;
         this.task_description=res.data.description;
                })
                .catch(error => {
                    console.log(error);
                });
    },



      //  update to do task Items----
      updateItem(id){
        let data={
          'name':this.task_name,
          'description':this.task_description 
         };
         let url="api/tasks/"+id;

        if(this.task_name.length>0){
          axios.put(url,data)
                .then(res => {
                this.message="Successfully updated";
        // Delay the action for 2 seconds
             setTimeout(() => {
                this.message="";
              }, 2000);
              
                })
                .catch(error => {
                    console.log(error);
                });
        }
      },
 

   
      

   

   },

   
}

</script>
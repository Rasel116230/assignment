
<template>
   <!-- Modal -->
<div v-if="openClose" class="modal fade show" style="display:block;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5">{{title}}</h2>
        <button type="button" class="btn-close" @click="operCloseFunction()" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <slot></slot>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  @click="operCloseFunction()">Close</button>
      </div>
    </div>
  </div>
</div>
    
<button type="button" :class="'btn mx-2 btn-'+variant"  @click="operCloseFunction()">{{ btnString }}</button>
    </template>
    
    <script>
    export default {
        name:"Modal",
        props:{
            visible:Boolean,
            title:String,
            variant:String,
            btnString:String
        },
        data: function() {
            return {
            openClose:this.visible,
            };
        },
        methods: {
            operCloseFunction(){
                this.openClose=!this.openClose;
            },
        },

        watch:{
            visible:function(newValue,oldValue){
                console.log(newValue);
            }
        }
    };
    </script>
    
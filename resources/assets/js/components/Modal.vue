<template>
<div>
    <button @click="show" class="button">Button</button>
    <div class="modal" :class ="{ 'is-active':showModal }">
        <div class="modal-background">

        </div>
        <div class="modal-content">
<!-- Any other Bulma elements you want -->
        {{  content }}
        </div>
        <button @click="hide" class="modal-close is-large" aria-label="close"></button>
    </div>
</div>
</template>

<script>
export default{
    props:[
        'content'
    ],

     data: ()=>{
        return {showModal:false}
    },
    methods: {
        show: function(){
            this.showModal=true
        },
        hide: function(){
            this.showModal=false
        }
    }
}
</script>
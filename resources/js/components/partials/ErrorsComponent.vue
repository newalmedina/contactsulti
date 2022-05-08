<template>

     <div class="row" v-if="message.length" >
        <div class="col-12 ">
            <div class="alert alert-danger">
                <h4>Errores de Validaciones. <small>{{getDate()}}</small>
</h4>
                <ul  v-for="item in message"  v-bind:key="item"  >
                    <li>{{item}}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
 name: "ErrorsComponent",
 props: {
    message: {
        type: Array,
    },
 },
    methods: {
        getDate(){
            return moment().format("DD/MM/YY HH:mm");
        },
    },
}
</script>
